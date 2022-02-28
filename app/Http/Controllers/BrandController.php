<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $brands = Brand::orderBy('id','desc')->get();
       return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:brands|max:45',
            'description' => 'string|nullable',
            
        ],[
            'name.required' => 'Please enter brand name',  
            // 'name.alpha' => 'Please don.t enter numbar',  
            'description.required' => 'Please enter Brand description',  
        ]);      

        $brand_id = Brand::insertGetId([
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        

        if($request->hasFile('image')){          
            $upload_photo = $request->file('image');
            $new_photo_name = $brand_id.".".$upload_photo->getClientOriginalExtension();
            $new_photo_location= 'public/upload/brand_photos/'. $new_photo_name;
            Image::make($upload_photo)->save(base_path($new_photo_location));
            Brand::find($brand_id)->update([
                'image' => $new_photo_name
            ]);

        }
        return redirect()->back()->with('message','brand Successfully Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Brand $brand)
    {
        if ($brand->status==1){
            $brand->update(['status'=>0]);
        }else{
            $brand->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Status Change Successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
    return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand){

    $request->validate([
        'name' => 'unique:brands,name',
       
        // .$request->brand_id
    ]); 


     $update = $brand->update([
        'name'=>$request->name,
        'description'=> $request->description,
     ]);

     
     if ($update){
         return back()->with('message','Cateory Update Successfully');
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $delete = $brand->delete();
        if($delete)
            return redirect()->back()->with('message', 'brand Delete Succesful!');
    }
}
