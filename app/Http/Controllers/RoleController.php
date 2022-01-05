<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }


    // =================================================================
    // =                          Backend                              =
    // =================================================================

    public function backendindex()
    {
        $roles  = Role::all();
        $update = false;
        return view('admin_dashboard.manage_roles', compact('roles', 'update'));
    }
    public function backendstore(StoreRoleRequest $request)
    {
        $this->validate($request, [
             'role'    => 'required|max:250',

        ]);
        Role::create([
            "role" => $request->role,
        ]);
        return redirect()->back();
    }

    public function backendedit($id)
    {
        $update = true;
        $roles  = Role::all();
        $role   = Role::find($id);
        return view('admin_dashboard.manage_roles', compact('role', 'roles', 'update'));
    }

    public function backenddestroy($request)
    {
        $role = Role::find($request);
        $role->delete();
        return redirect()->route('roles.index');
    }

    public function backendupdate(UpdateRoleRequest $request,  $id)
    {
        $role       = Role::find($id);
        $role->role = $request->role;
        $role->update();
        return redirect()->route('roles.index');
    }
}
