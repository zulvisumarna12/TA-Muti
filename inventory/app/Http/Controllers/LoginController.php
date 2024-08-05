<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controllers
{
    //
    public function index(){
        return view('auth.login');
    }
    public function login_proses(request $request){
        return view('home');
    }


}
