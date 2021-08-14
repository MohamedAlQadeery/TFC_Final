<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderStoreRequest;
use App\Models\Slider;
use App\Traits\FilepondUploadTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use FilepondUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::whenSearch(request()->search)
        ->whenStatus(request()->status)
        ->latest()
        ->paginate(5);

        //to make reset button in blade
        $is_searched = request()->search || request()->status;

        return view('dashboard.slider.index', compact('sliders', 'is_searched'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SliderStoreRequest $request)
    {
        $data = $request->except(['files']);

        $tmp_folder = $request->input('files')[0];

        $slider = Slider::create($data);

        //uploads filepond image
        $this->fileUpload($slider, $tmp_folder);

        return redirect()->route('dashboard.sliders.index')->with('success', 'success');
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
    public function edit(Slider $slider)
    {
        return view('dashboard.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SliderStoreRequest $request, Slider $slider)
    {
        if ($request->input('files')) {
            //delete old image
            $slider->getMedia()[0]->delete();

            $tmp_folder = $request->input('files')[0];
            $this->fileUpload($slider, $tmp_folder);
        }
        $slider->update($request->validated());

        return redirect()->route('dashboard.sliders.index')->with('success_edit', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('dashboard.sliders.index')->with('success_delete', 'success_delete');
    }
}
