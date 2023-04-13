<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backendTheme.sliders.index',[
            'sliders'=>$sliders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backendTheme.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Slider::create([
            'slider_title'=> $request->slider_title,
            'short_title'=> $request->short_title,
            'slider_image'=>$this->uploadImage(request()->file('slider_image'))
        ]);
        return redirect()->route('sliders.index')->withMessage('Slider added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(slider $slider)
    {
        return view('backendTheme.sliders.show',[
            'slider'=>$slider
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(slider $slider)
    {
        return view('backendTheme.sliders.edit',[
            'slider'=>$slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, slider $slider)
    {
        $requestData=[
            'slider_title'=> $request->slider_title,
            'short_title'=> $request->short_title,
            'slider_image'=>$this->uploadImage(request()->file('slider_image'))

        ];
        if($request->hasFile('slider_image')){
            $requestData['slider_image']=$this->uploadImage(request()->file('slider_image'));
        }
        $slider->update($requestData);

//            'image'=>$this->uploadImage(request()->file('image'))
        return redirect()->route('sliders.index')->withMessage('Slide updated
        successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(slider $slider)
    {
        $slider->delete();
        return redirect()->route('sliders.index')->withMessage('Slider deleted successfully');
    }
    public function uploadImage($file)
    {
        $fileName=time().'.'.$file->getClientOriginalExtension();
        Image::make($file)
            ->resize(200,200)
            ->save(storage_path().'/app/public/'.$fileName);
        return $fileName;
    }
}
