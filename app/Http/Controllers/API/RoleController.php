<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/** 
 * Refer to Modal
 */
use App\Models\Role;

/**
 * Import Hash Facades
 */
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
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
        return Role::latest()->paginate(10);
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
        // validation
        $this->validate($request, [
            'title' => 'required|string|max:255',
        ]);

        //
        //return ['message' => 'oookkk']; 
        //return $request->all();
        return Role::create([
            'title' => $request['title'],
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
        //
    return Role::findOrFail($id);
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
        
        $Role = Role::findOrFail($id);

        // validation
        $this->validate($request, [
            'title' => 'required|string|max:255',
        ]);
       
        $Role->update($request->all());
        

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
        $Role = Role::findOrFail($id);
        $Role->delete();
        return ['message' => 'Role deleted'];
    }
}
