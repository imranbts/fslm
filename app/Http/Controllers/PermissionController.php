<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PermissionController extends Controller
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

        $routeCollection = Route::getRoutes();
        $uris = [];
        foreach ($routeCollection as $value) {
            $uris[] = $value->getName();
        }

        $permissions = [];
        $roles = [];
        $users = [];

        foreach ($uris as $key => $value) {

            $mix = explode('.', $value);
            $mix = $mix[0];

            if (DB::table('permissions')->where('route', $value)->doesntExist()) {
                if ($mix == 'permission') {

                    $permissions[] = array(
                        'route' => $value,
                        'status' => '1',
                    );

                } elseif ($mix == 'role') {
                    $roles[] = array(
                        'route' => $value,
                        'status' => '1',
                    );

                } elseif ($mix == 'user') {
                    $users[] = array(
                        'route' => $value,
                        'status' => '1',
                    );
                }

            } else {

                if ($mix == 'permission') {

                    $permissions[] = array(
                        'route' => $value,
                        'status' => '0',
                    );

                } elseif ($mix == 'role') {
                    $roles[] = array(
                        'route' => $value,
                        'status' => '0',
                    );

                } elseif ($mix == 'user') {
                    $users[] = array(
                        'route' => $value,
                        'status' => '0',
                    );
                }

            }

        }

        $available_capablities[] = ['permissions' => $permissions, 'roles' => $roles, 'users' => $users];

        return view('admin.permission.create', compact('available_capablities'));
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
}
