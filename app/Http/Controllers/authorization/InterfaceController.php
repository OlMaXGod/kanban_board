<?php

namespace App\Http\Controllers\authorization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterfaceController extends Controller
{
    public function show() {
        return view('authorization/main');
     }
}
