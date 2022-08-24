<?php

namespace App\Http\Controllers;

use App\Models\UserPermission;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{


    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    public function UserPermissions(Request $request)
    {
        $sigs = $request->signal;
        $userid = $request->userid;
        UserPermission::where('userid', $userid)->update(array('permission_stats' => $sigs));
    }

    public function show(UserPermission $userPermission)
    {
        //
    }


    public function edit(UserPermission $userPermission)
    {
        //
    }

    public function update(Request $request, UserPermission $userPermission)
    {
        //
    }

    public function destroy(UserPermission $userPermission)
    {
        //
    }
}
