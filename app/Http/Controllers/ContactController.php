<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contact;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
class ContactController extends Controller
{
    public function contact_show()
    {
        // $contacts=Contact::all();
        $contacts=Contact::latest()->limit(20)->get();
        return view('admin.contact.index',compact('contacts'));
    }


    public function contact_create()
    {
        return view('admin.contact.create');
    }
     public function contact(Request $request){
       

      $contact_id = Contact::insertGetId([
           'contact_name' => $request->contact_name,
           'contact_email' => $request->contact_email,
           'contact_description' => $request->contact_description,
           'created_at' => Carbon::now(),
           
       ]);

       if($request->hasFile('contact_image')){
           echo DB::table('contacts')->where('contact_image')->first();
    //        $upload_photo = $request->file('contact_image');
      
    //        $new_photo_name = $contact_id.".".$upload_photo->getClientOriginalExtension();
    //        $new_photo_location = 'public/upload/contact_photos/'.$new_photo_name;
    //        Image::make($upload_photo)->save(base_path($new_photo_location));
    //        Contact::find($contact_id)->update([
    //         'contact_image'=>$new_photo_name
    //        ]);
    //    }
    //    return back();
       
     }
     
}
}
