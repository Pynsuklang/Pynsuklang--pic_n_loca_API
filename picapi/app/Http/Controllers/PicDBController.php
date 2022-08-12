<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\PicDB;
use App\Models\ManageUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail as FacadesMail;
use App\Mail\ForgotPwdMail;

class PicDBController extends Controller
{

    public function index()
    {
    }
    public function createAcc(Request $request) //create account
    {
        $acc_avl = 3;
        try {
            $acc_avl = 0; //0 is for not available and 1 is for already available
            $myusnm = $request->usnm;
            $name = $request->name;
            $pwd = $request->pwd;
            $hashedPassword = Hash::make($pwd);
            $cnt_user = ManageUser::where('user_email', $myusnm)->count();
            if ($cnt_user > 0) {
                $acc_avl = 1;
            } else {
                $uservals = new ManageUser();
                $uservals->user_name = $name;
                $uservals->user_email = $myusnm;
                $uservals->user_password = $hashedPassword;
                $uservals->save();
                $acc_avl = 0;
            }
            return response()->json($acc_avl, 200);
        } catch (\Throwable $th) {
            $acc_avl = 3;
            return response()->json($acc_avl, 200);
        }
    }
    public function LoginAcc(Request $request) //create account
    {
        $access = 3;
        try {
            $myusnm = $request->email;
            $pwd = $request->password;
            $cnt_user = ManageUser::where('user_email', $myusnm)
                ->get(['user_password']);
            if (count($cnt_user) == 1) {
                $hashedPassword = $cnt_user[0]->user_password;
                if (Hash::check($pwd, $hashedPassword)) {
                    $access = 0;
                } else {
                    $access = 1;
                }
            } else if (count($cnt_user) != 1) //account not available
            {
                $access = 1;
            }
            return response()->json($access, 200);
        } catch (\Exception $e) {
            $access = 3;
            return response()->json($access, 200);
        }
        //1 for granted access and 0 is for denied access
    }

    public function ForgotPwd(Request $request) //create account
    {
        $access = 3;
        try {
            $myusnm = $request->email;
            $cntr = ManageUser::where('user_email', $myusnm)->count();
            if ($cntr > 0) {
                $details = [
                    'title' => 'Password Reset Link',
                    'body' => 'This is for testing email using smtp'
                ];
                //FacadesMail::to($myusnm)->send(new ForgotPwdMail($details));
                FacadesMail::to('pynmaw@gmail.com')->send(new ForgotPwdMail($details));
                $access = 0;
            } else {
                $access = 1;
            }
            return response()->json($access, 200);
        } catch (\Exception $e) {
            dd($e);
            $access = 3;
            return response()->json($access, 200);
        }
        //1 for granted access and 0 is for denied access
    }

    public function store(Request $request) //login account
    {
        try {
            $lati = $request->latitude;
            $longi = $request->longitude;
            $emailid = $request->emailid;

            $f_trfare = $request->file('image');
            $fileName1 = uniqid() . $f_trfare->getClientOriginalName();
            $path2 = $path = public_path() . '/myfiles/';
            $f_trfare->move($path, $fileName1);
            $path2 = str_replace('/', "'\'", $path2);
            $path2 = str_replace("'", "", $path2);
            $usrid = ManageUser::where('user_email', $emailid)->get(['id']);

            $usrid = $usrid[0]->id;

            $datas = new PicDB();
            $datas->latitude_data = $lati;
            $datas->longitude_data = $longi;
            $datas->userid = $usrid;
            $datas->file_location = $fileName1;
            $datas->save();
            return response()->json($path2, 200);
        } catch (\Throwable $th) {
            return response()->json('Error', 200);
        }
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
