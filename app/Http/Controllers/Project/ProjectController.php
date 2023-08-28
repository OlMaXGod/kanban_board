<?php

namespace App\Http\Controllers\Project;

use App\Models\projects;
use App\Models\project_participants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function createProject(Request $request)
    {

        $projectName = $response['projectName'] = $request->input('name');
        $projectComment = $response['projectComment'] = $request->input('comment');
        $projectType = $response['projectType'] = $request->input('type');
        $projectAccess = $response['projectAccess'] = $request->input('access');
       
        
        $response['resultat'] = projects::insert(
            [
                'name' => $projectName, 
                'comment' => $projectComment,
                'type' => $projectType,
                'access' => $projectAccess,
                'who_changed' => auth()->user()->id,
            ]
        );

        return $response;

    }

}
