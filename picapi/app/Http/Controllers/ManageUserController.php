<?php

namespace App\Http\Controllers;

use App\Models\ManageUser;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = ManageUser::leftJoin('user_permissions', 'manage_users.id', '=', 'user_permissions.userid')
            ->where('user_permissions.permission_stats', -1)
            ->get(['manage_users.id', 'manage_users.user_name', 'manage_users.user_email']);
        return view('user-management', ['users' => $users]);
    }
    public function GetUserData()
    {
        return response()->json("OK", 200);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManageUser  $manageUser
     * @return \Illuminate\Http\Response
     */
    public function show(ManageUser $manageUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManageUser  $manageUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ManageUser $manageUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManageUser  $manageUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManageUser $manageUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManageUser  $manageUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageUser $manageUser)
    {
        //
    }
}
