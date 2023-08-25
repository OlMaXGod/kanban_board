<?php

namespace App\Http\Controllers\Main_page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\projects;
use App\Models\User;
use App\Models\project_participants;

class MainController extends Controller
{
    public function __construct()
    {
  
        
    }

    public function show($id){

        return view('main_page.main',["projects" => projects::all(),"users" =>User::all(),"projectParticipants" =>project_participants::all()]);

    }
    
}

