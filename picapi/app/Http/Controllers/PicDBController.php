<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\PicDB;
use App\Models\ManageUser;
use Illuminate\Http\Request;
use App\Models\User;

class PicDBController extends Controller
{

    public function index()
    {

    }
    public function createAcc(Request $request)//create account
    {
        $acc_avl = 0; //0 is for not available and 1 is for already available
        $myusnm = $request->usnm;
        $name = $request->name;
        $pwd = $request->pwd;
        $hashedPassword = Hash::make($pwd);
        //return response()->json($hashedPassword, 200);
        $cnt_user = ManageUser::where('user_email', $myusnm)->count();
        if ($cnt_user>0) {
            $acc_avl = 1;
        } else {
            $uservals = new ManageUser();
            $uservals->user_name = $name;
            $uservals->user_email = $myusnm;
            $uservals->user_password = $hashedPassword;
            $uservals->save();
            // User::create([
            //     'name' => $name,
            //     'email' => $myusnm,
            //     'password' => Hash::make($pwd),
            // ]);
            $acc_avl = 0;
        }
        return response()->json($acc_avl, 200);
    }
    public function LoginAcc(Request $request)//create account
    {
        //1 for granted access and 0 is for denied access
        $access = 3;
        $myusnm = $request->email;
        $pwd = $request->password;
        $cnt_user = ManageUser::where('user_email', $myusnm)
        ->get(['user_password']);
        if (count($cnt_user) == 1)
        {
            $hashedPassword = $cnt_user[0]->user_password;
            if(Hash::check($pwd, $hashedPassword))
            {
                $access = 0;
            }
            else
            {
                $access = 1;
            }
        }
        else if (count($cnt_user) != 1)//account not available
        {
            $access = 1;
        }
        return response()->json($access, 200);
    }

    public function store(Request $request)//login account
    {

    }

    public function show(PicDB $picDB)
    {
        //
    }


    public function edit(PicDB $picDB)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PicDB  $picDB
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PicDB $picDB)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PicDB  $picDB
     * @return \Illuminate\Http\Response
     */
    public function destroy(PicDB $picDB)
    {
        //
    }
}
