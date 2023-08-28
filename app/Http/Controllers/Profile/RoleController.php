<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\roles;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class RoleController extends Controller
{    
    public function __construct(){
        
        $this->middleware('auth');

    }

    public function index(){

        return ['resultat' => roles::all()];

    }
}
