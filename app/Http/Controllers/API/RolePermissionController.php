<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/** 
 * Refer to Modal
 */
use App\Models\RolePermission;

/**
 * Import Hash Facades
 */
use Illuminate\Support\Facades\Hash;

class RolePermissionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() 
    {
        $this->middleware('auth:api');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return RolePermission::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'role_id' => 'required|integer|max:6',
            'permission_id' => 'required|integer|max:6',
        ]);

        //
        //return ['message' => 'oookkk']; 
        //return $request->all();
        return RolePermission::create([
            'role_id' => $request['role_id'],
            'permission_id' => $request['permission_id'],
        ]);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return RolePermission::findOrFail($id);
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
        $role_permission = RolePermission::findOrFail($id);

        // validation
        $this->validate($request, [
            'role_id' => 'required|integer|max:6',
            'permission_id' => 'required|integer|max:6',
        ]);
       
        $role_permission->update($request->all());
        

        return ['message' => 'updated successfully !'];
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
        $role_permission = RolePermission::findOrFail($id);
        $role_permission->delete();
        return ['message' => 'Role Permission deleted'];
    }
}
