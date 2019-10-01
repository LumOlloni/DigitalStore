<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DateTime;


class BlockUsersController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user =User::where('id' , '!=' ,$id)->get() ;

        $startTime = strtotime('now');
        $endTime = strtotime("+2 weeks" ,   $startTime );

        return view('adminTemplate.blockUsers')->with(['user' => $user , 'startTime' => $startTime , 'endTime' => $endTime ]);
    }

    public function blockUser(Request $request , $id){

        if(User::find($id)){
            $user = User::find($id);
            $user->banned_until = $request->number;
    
            $user->save();
    
            session()->flash('successBlock' , 'User blocked Succefully');
            return response()->json(['success' => true]);
    
        }
        else {
            session()->flash('error' , 'Somthing wrong happened try again');
            return response()->json(['error' => true]);
        }

    }

    public function unBlockUser(Request $request , $id)
    {
        $user = User::find($id);
        $user->banned_until = NULL;

        $user->save();
        session()->flash('successUblock' , 'You unblock user succefully');
        return response()->json(['success' => true]);
    }
}
