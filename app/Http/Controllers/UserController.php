<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Result;
use App\Models\Exam;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $exams   = Exam::all();

       $results = Result::where('user_id',auth()->user()->id)->get();

       return view('public-site.userProfile',compact('results','exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
    // =================================================================
    // =                          Backend                              =
    // =================================================================

    public function backendindex()
    {
        $users  = User::all();
        $roles  = Role::all();
        $update = false;
        return view('admin_dashboard.manage_users', compact('users', 'update', 'roles'));
    }
    public function backendstore(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required| max:250',
            'email'     => 'required| email',
            'password'  => 'required| min:6 | max:30',
            'user_role' => 'required| max:250',

        ]);
        User::create([
            "name"     => $request->name,
            "email"    => $request->email,
            "password" => Hash::make($request->password),
            "role_id"  => $request->user_role,
        ]);
        return redirect()->back();
    }

    public function backendedit($id)
    {
        $update = true;
        $roles  = Role::all();
        $users  = User::all();
        $user   = User::find($id);
        return view('admin_dashboard.manage_users', compact('user', 'users', 'roles', 'update'));
    }

    /*Update User Info*/
    public function backendupdate(Request $request,  $id)
    {
        $user           = User::find($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id  = $request->user_role;
        $user->update();
        return redirect()->route('user.index');
    }

    /*Delete User */
    public function backenddestroy($request)
    {
        $user = User::find($request);
        $user->delete();
        return redirect()->route('user.index');
    }
}
