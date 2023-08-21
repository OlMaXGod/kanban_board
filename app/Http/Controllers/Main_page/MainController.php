<?php

namespace App\Http\Controllers\Main_page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function __construct()
    {
  
        
    }

    public function show($id){

        

        return view('main_page.main');

    }
    
}

