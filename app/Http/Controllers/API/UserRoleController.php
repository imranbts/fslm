<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/** 
 * Refer to Modal
 */
use App\Models\UserRole;

/**
 * Import Hash Facades
 */
use Illuminate\Support\Facades\Hash;

class UserRoleController extends Controller
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
        return UserRole::latest()->paginate(10);
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
            'user_id' => 'required|integer|max:6',
            'role_id' => 'required|integer|max:6',
        ]);

        //
        //return ['message' => 'oookkk']; 
        //return $request->all();
        return UserRole::create([
            'user_id' => $request['user_id'],
            'role_id' => $request['role_id'],
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
        return UserRole::findOrFail($id);
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
        $user_role = UserRole::findOrFail($id);

        // validation
        $this->validate($request, [
            'user_id' => 'required|integer|max:6',
            'role_id' => 'required|integer|max:6',
        ]);
       
        $user_role->update($request->all());
        

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
        $user_role = UserRole::findOrFail($id);
        $user_role->delete();
        return ['message' => 'User Role deleted'];
    }
}
