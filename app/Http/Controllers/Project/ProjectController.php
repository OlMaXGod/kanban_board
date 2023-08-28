<?php

namespace App\Http\Controllers\Project;

use App\Models\projects;
use App\Models\project_participants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');

    }

    public function index(Request $request){

        $projectId = $response['id_project'] = $request->input('id');

        $response['resultat'] = projects::find($projectId)->get();

        return $response;

    }

    public function getProjects(){

        $id = $response['id_user'] = auth()->user()->id;

        $response['resultat'] = projects::where('who_changed', '=', $id)->get();

        return $response;

    }

    public function delete(Request $request)
    {

        $projectId = $response['id_project'] = $request->input('id');
        
        $response['resultat'] = projects::find($projectId)->delete();

        return $response;

    }

    public function leaveProject(Request $request)
    {

        $projectId = $response['id_project'] = $request->input('projectId');
        $userId = $response['id_user'] = $request->input('userId');
       
        
        $response['resultat'] = project_participants::where('project_id',$projectId)
                               ->where('participant_id',$userId)
                               ->first()
                               ->delete();

        return $response;

    }

    public function joinProject(Request $request)
    {

        $projectId = $response['id_project'] = $request->input('projectId');
        $userId = $response['id_user'] = $request->input('userId');
       
        
        $response['resultat'] = project_participants::insert(
            [
                'project_id' => $projectId, 
                'participant_id' => $userId,
                'role_id' => 3,
            ]
        );

        return $response;

    }

}
