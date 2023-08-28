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
                'comment' => 'Новый участник',
                'entry_request' => false,
            ]
        );

        return $response;

    }

    public function createInvitationUrl(Request $request){

        $id_project = $response['id_project'] = $request->input('id');

        $response['resultat'] = "http://localhost/kanban_board/public/project/add_user_url/"+$id_project;
        
        return $response;

    }

    public function addUserInProjectUrl($id_user, $id_project, Request $request){

        $id_project = $response['id_project'] = $id_project;
        $id_user = $response['id_user'] = $id_user;
       
        $response['resultat'] = project_participants::insert(
            [
                'project_id' => $id_project, 
                'participant_id' => $id_user,
                'role_id' => 3,
                'comment' => 'Новый участник по ссылке',
                'entry_request' => true,
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
       
        
        $response['resultat'] = projects::create(
            [
                'name' => $projectName, 
                'comment' => $projectComment,
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
