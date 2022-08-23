<?php

namespace App\Http\Controllers;

use App\Models\ManageUser;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dets = ManageUser::join('pic_d_b_s', 'pic_d_b_s.userid', '=', 'manage_users.id')->get([
            'manage_users.id',
            'manage_users.user_name',
            'manage_users.user_email',
            'pic_d_b_s.latitude_data',
            'pic_d_b_s.longitude_data',
            'pic_d_b_s.file_location'
        ]);
        return view('home', ['dets' => $dets]);
    }
}
