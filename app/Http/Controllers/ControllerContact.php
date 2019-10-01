<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Request;
use Mail;
use Session;

class ControllerContact extends Controller
{
    public function email(Request $request)
    {
        $this->validate( $request, [
            'subject' => 'required|min:3',
            'email' => 'required|email',
            'textMessage' => 'required|min:10'
        ]);
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'textMessage' => $request->textMessage
        );
        Mail::send('emails.contact' ,   $data , function ($message) use($data)
        {
            $message->from($data['email']);
            $message->to('lumolloni12@gmail.com' , 'Lum Olloni');
            $message->subject($data['subject']);
        } );
        return redirect('/contact')->with('success','Your Email was sent');;
    }

   public function error(){
       if(!session()->has('unathorizedPage')){

        return redirect()->back();
       }
        else {
            return view('viewComponents.error');
        }


   }
}
