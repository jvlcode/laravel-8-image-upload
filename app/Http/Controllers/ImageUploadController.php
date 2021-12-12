<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function imageUploadForm(){
        return view('image_upload');
    }

    public function imageUpload(Request $request){
        $request->validate([
            'image'=>'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        return back()
        ->withSuccess('You have succesfully uploaded the image!')
        ->withImageName( $imageName );
    }
}
