<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\WhwayEmail;
use App\Models\Whway;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class WhwayController extends Controller
{
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'child_name' => 'required',
            'parent_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'instagram' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $path = Storage::disk('digitalocean')->putFile('uploads', $request->file('image'), 'public');
        $image = trim($path,"uploads/");

        $whway = Whway::create([
            'child_name' => $request->child_name,
            'parent_name' => $request->parent_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'image' => $image,
         ]);


        echo $whway;
        Mail::to($whway->email)->send(new WhwayEmail($whway));
        if(Mail::failures() != 0) {
            echo "<p> Success! Your E-mail has been sent.</p>";
        }else {
            echo "<p> Failed! Your E-mail has not sent.</p>";
        }

        return response()
            ->json(['message' => 'success' ]);
    }
}
