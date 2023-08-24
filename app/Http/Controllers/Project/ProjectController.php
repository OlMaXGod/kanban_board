<?php

namespace App\Http\Controllers\Project;

use App\Models\projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');

    }

    public function index(Request $request){

        $data = $request->validate([
            'id' => 'int'
          ]
        );

        return projects::find($data['id'])->get();

    }

    public function getProjects(){

        $id = auth()->user()->id;

        return projects::where('who_changed', '=', $id)->get();

    }

    public function delete(Request $request)
    {

        $data = $request->validate([
            'id' => 'int'
          ]
        );

        $deleted = projects::find($data['id'])->delete();

        $data = [
            'message' => "Все вроде нормально",
        ];

        return $data;

    }
}
