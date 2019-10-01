<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   public function index()
   {
      
   
        return view('template.profile');
   }

   public function updateProfile(Request $request , $id){

        $this->validate($request , [
            'oldPassword' => 'required|string',
            'password' => ['required' , 'string', 'min:8' , 'confirmed'], 
        ]);


         $hashedPassword = Auth::user()->password;

      if (Hash::check($request->oldPassword, $hashedPassword)) { 

         $user = User::find($id);

         $user->password = Hash::make($request->password);

         $user->save();
      
        return redirect()->back()->with('success' , 'Password is Changed Successfully');
      
      } else {
            
          return redirect()->back()->with('error' , 'Old  Password is invalid');
      }
   }

}
