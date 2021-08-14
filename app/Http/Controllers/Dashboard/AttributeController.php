<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attribute\AttributeStoreRequest;
use App\Models\Attribute;
use App\Traits\FilepondUploadTrait;

class AttributeController extends Controller
{
    use FilepondUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::whenSearch(request()->search)
        ->latest()
        ->paginate(5);

        //to make reset button in blade
        $is_searched = request()->search;

        return view('dashboard.attribute.index', compact('attributes', 'is_searched'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeStoreRequest $request)
    {
        $attribute = Attribute::create($request->validated());

        return redirect()->route('dashboard.attributes.index')->with('success', 'success');
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
    public function edit(Attribute $attribute)
    {
        return view('dashboard.attribute.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeStoreRequest $request, Attribute $attribute)
    {
        $attribute->update($request->validated());

        return redirect()->route('dashboard.attributes.index')->with('success_edit', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return redirect()->route('dashboard.attributes.index')->with('success_delete', 'success_delete');
    }
}
