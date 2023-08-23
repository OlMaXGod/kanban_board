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

    public function index(){

        $id = auth()->user()->id;    
        
        $projects = projects::where('who_changed', '=', $id)->get();
        $projectsData = [];
        foreach($projects as $project){
            $projectsData[$project['id']] = [
                'name' => $project['name'],
                'comment' => $project['comment'],
            ];
        }

        return $projectsData;

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
