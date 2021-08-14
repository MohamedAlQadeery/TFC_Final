<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Models\Category;
use App\Traits\FilepondUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use FilepondUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::whenSearch(request()->search)
        ->whenStatus(request()->status)
        ->withCount('foods')
        ->latest()
        ->paginate(5);

        //to make reset button in blade
        $is_searched = request()->search || request()->status;

        return view('dashboard.category.index', compact('categories', 'is_searched'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $data = $request->except(['files']);

        $tmp_folder = $request->input('files')[0];

        $category = Category::create($data);

        //uploads filepond image
        $this->fileUpload($category, $tmp_folder);

        return redirect()->route('dashboard.categories.index')->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryStoreRequest $request, Category $category)
    {
        if ($request->input('files')) {
            //delete old image
            $category->getMedia()[0]->delete();

            $tmp_folder = $request->input('files')[0];
            $this->fileUpload($category, $tmp_folder);
        }
        $category->update($request->validated());

        return redirect()->route('dashboard.categories.index')->with('success_edit', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('dashboard.categories.index')->with('success_delete', 'success_delete');
    }
}
