<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Food\FoodStoreRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Food;
use App\Traits\FilepondUploadTrait;

class FoodController extends Controller
{
    use FilepondUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::whenSearch(request()->search)
        ->whenStatus(request()->status)
        ->whenCategory(request()->category)
        ->latest()
        ->paginate(5);

        $categories = Category::where('status', 1)->get();

        //to make reset button in blade
        $is_searched = request()->search || request()->status | request()->category;

        return view('dashboard.food.index', compact('foods', 'categories', 'is_searched'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $attributes = Attribute::all();

        return view('dashboard.food.create', compact('categories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FoodStoreRequest $request)
    {
        $data = $request->except(['files', 'attributes']);

        $tmp_folder = $request->input('files')[0];

        $food = Food::create($data);

        //uploads filepond image
        $this->fileUpload($food, $tmp_folder);

        //sync attributes
        $food->attributes()->sync($request->input('attributes'));

        return redirect()->route('dashboard.foods.index')->with('success', 'success');
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
    public function edit(Food $food)
    {
        $categories = Category::where('status', 1)->get();
        $attributes = Attribute::all();

        $food_attributes = $food->attributes->pluck('id')->toArray();

        return view('dashboard.food.edit', compact('food', 'food_attributes', 'categories', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(FoodStoreRequest $request, Food $food)
    {
        $data = $request->except(['files', 'attributes']);
        if ($request->input('files')) {
            //delete old image
            $food->getMedia()[0]->delete();

            $tmp_folder = $request->input('files')[0];
            $this->fileUpload($food, $tmp_folder);
        }
        $food->update($data);
        $food->attributes()->sync($request->input('attributes'));

        return redirect()->route('dashboard.foods.index')->with('success_edit', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()->route('dashboard.foods.index')->with('success_delete', 'success_delete');
    }
}
