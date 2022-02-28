<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'name' => 'required|alpha',
            'description' => 'required',
            'image' => 'required',
        ],[
            'name.required' => 'Please enter slider name',  
            'name.alpha' => 'Please don.t enter numbar',  
            'description.required' => 'Please enter slider description',  
        ]);

        $slider=new Slider();
        $slider->id= $request->slider;
        $slider->name= $request->name;
        $slider->description= $request->description;
        $slider->image= $request->image->store('brand');



        $slider->save();
        return redirect()->back()->with('message','brand Successfully Created');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Slider $slider)
    {
        if ($slider->status==1){
            $slider->update(['status'=>0]);
        }else{
            $slider->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
    return view('admin.brand.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
     $update = $slider->update([
        'name'=>$request->name,
        'description'=> $request->description,
        'image'=>$request->file('image')->store('slider')
     ]);
     if ($update){
         return redirect('/slider')->with('message','Cateory Update Successfully');
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $delete = $slider->delete();
        if($delete)
            return redirect()->back()->with('message', 'brand Delete Succesful!');
    }
}
