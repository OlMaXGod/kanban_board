<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = [
            'FIO' => "Ivanov Ivan Ivanovich",
            'number' => "89998887766",
            'password' => "0000",
        ];
        return view('profile/main', compact('data'));
    }
}
