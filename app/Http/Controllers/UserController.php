<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;
use Illuminate\Support\Facades\Input;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleName = ['admin', 'Editor'];

        $users = User::whereHas('roles', function ($q) use ($roleName) {
            $q->whereIn('name',  $roleName);
        })->get();


        return view('adminTemplate.role')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }
    public function addAdmin()
    {

        $roles = ['admin', 'Editor'];
        $role = Role::whereIn('name', $roles)->get();

        return view('adminTemplate.addAdmin')->with('role', $role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'img' => ['required', 'mimes:jpeg,jpg,png,gif', 'max:10000'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $fileName = 'null';
        if (Input::file('img')->isValid()) {
            $destinationPath = public_path('images/imgUsers');
            $extension = Input::file('img')->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;

            Input::file('img')->move($destinationPath, $fileName);
        }

        $role = $request->addAdmin;
        $userRole = Role::where('name', $role)->first();

        $user = new User;
        $password = Input::get('password');
        $hashed = Hash::make($password);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password =  $hashed;
        $user->image = $fileName;

        $user->save();

        $user->roles()->attach($userRole);

        return redirect()->back()->with('success', 'Role for User created Succefully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->back()->with('warning', 'Ti nuk mund ti ndryshosh rolet vetes');
        }
        $roleUser = ['admin', 'Editor', 'superadmin'];
        $roles = Role::whereIn('name', $roleUser)->get();


        return view('adminTemplate.editAdmin')->with(['user' => User::find($id), 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->roles()->sync($request->roles);

        return redirect('/menage/roleUsers')->with('success', 'Rolet e userit u ndryshuan me sukses !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
