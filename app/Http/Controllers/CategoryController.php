<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories=Category::all();
        // $categories=Category::orderBy('id','desc')->get();
        $categories=Category::latest()->limit(20)->get();
        // $categories=Category::latest()->paginate(3);
        $total_user=Category::count();
        return view('admin.category.index',compact('categories','total_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'description' => 'required',
            'status' => 'required'
        ],[
            'name.required' => 'Please enter category name',  
            'name.alpha' => 'Please don.t enter numbar',  
            'description.required' => 'Please enter category description',
            'status.required' => 'Please click checkbox',   
        ]);

        $category_id = Category::insertGetId([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        if($request->hasFile('image')){
            $upload_photo = $request->file('image');
            $new_photo_name = $category_id.".".$upload_photo->GetClientOriginalExtension();
            $new_photo_location='public/upload/photos/'.$new_photo_name;
            Image::make($upload_photo)->save(base_path($new_photo_location));
            Category::find($category_id)->update([
                'image' => $new_photo_name
            ]);

        }
        return redirect()->back()->with('message','Category Successfully Created');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Category $category)
    {
        if ($category->status==1){
            $category->update(['status'=>0]);
        }else{
            $category->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
    return view('admin.category.edit',compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
     $update = $category->update([
        'name'=>$request->name,
        'description'=> $request->description,
        'image'=>$request->file('image')->store('category')
     ]);
     if ($update){
         return redirect('/categories')->with('message','Cateory Update Successfully');
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $delete = $category->delete();
        if($delete)
            return redirect()->back()->with('message', 'Category Delete Succesful!');
    }


}
