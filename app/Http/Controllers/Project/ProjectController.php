<?php

namespace App\Http\Controllers\Project;

use App\Models\projects;
use App\Models\project_participants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\phase_participants;
use App\Models\project_phase;



class ProjectController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');

    }


    public function show($projectId){
        
        return view('project_page.main',[
            "project" => projects::where('id',$projectId)->first(),
            "users" =>User::all(),
            "projectParticipants" =>project_participants::where('project_id',$projectId)->get(),
            "statusList" =>[
                0 => "Ожидание",
                1 => "В работе",
                2 => "Закрыта"
            ],
            "phase_participants" =>phase_participants::where('project_id',$projectId)->selectRaw("*
                , CASE
                    WHEN TIMESTAMPDIFF(HOUR, NOW(), `time_frome`) >= 0
                        AND `status` = 1
                        THEN 'subtask-color-1'
                    WHEN (TIMESTAMPDIFF(HOUR, NOW(), `time_frome`) <= 2 AND TIMESTAMPDIFF(HOUR, NOW(), `time_frome`) >= 0 AND `status` = 0)
                        OR (TIMESTAMPDIFF(HOUR, NOW(), `time_to`) <= 2 AND TIMESTAMPDIFF(HOUR, NOW(), `time_to`) >= 0 AND `status` = 1)
                        THEN 'subtask-color-2'
                    WHEN `status` = 2
                        THEN 'subtask-color-3'
                    WHEN (TIMESTAMPDIFF(HOUR, NOW(), `time_frome`) < 0 AND TIMESTAMPDIFF(HOUR, NOW(), `time_frome`) >= -24 AND `status` = 0)
                        OR (TIMESTAMPDIFF(HOUR, NOW(), `time_to`) < 0 AND TIMESTAMPDIFF(HOUR, NOW(), `time_to`) >= -24 AND `status` = 1)
                        THEN 'subtask-color-4'
                    WHEN (TIMESTAMPDIFF(HOUR, NOW(), `time_frome`) < -24 AND `status` = 0)
                        OR (TIMESTAMPDIFF(HOUR, NOW(), `time_to`) < -24 AND `status` = 1)
                        THEN 'subtask-color-5'
                    ELSE 'subtask-color-0'
                END AS class_color")->get(),
            "project_phases" =>project_phase::where('project_id',$projectId)->get()
        ]);

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

        date_default_timezone_set( 'Europe/Moscow' );

        $type = $response['type'] = $request->input('type');

        $projectId = $response['id_project'] = $request->input('projectId');
        $userId = $response['id_user'] = $request->input('userId');
       
        
        $response['resultat'] = project_participants::insert(
            [
                'updated_at' => date('Y-m-d H:i:s'), 
                'created_at' => date('Y-m-d H:i:s'), 
                'project_id' => $projectId, 
                'participant_id' => $userId,
                'role_id' => 3,
                'comment' => 'Новый участник',
                'entry_request' => $type,
            ]
        );

        return $response;

    }


    public function inviteProject($id_project, Request $request){

        $id_project = $response['id_project'] = $id_project;
        $id_user = $response['id_user'] = auth()->user()->id;
       
        
        $result = projects::where('id', $id_project)
                               ->select('type','name')
                               ->first();
        
        if ($result['type'] == 1){
            // открытый
            $response['status'] = 'open';
        } else if ($result['type'] == 0){
            // закрытый
            $response['status'] = 'close';
        }
        $response['name'] = $result['name'];

        //return view('project-page', compact('response')); ??? чтобы перейти в project-page ???

        return $response;

    }

    public function createProject(Request $request)
    {
        date_default_timezone_set( 'Europe/Moscow' );

        $projectName = $response['projectName'] = $request->input('name');
        $projectComment = $response['projectComment'] = $request->input('comment');
        $projectType = $response['projectType'] = $request->input('type');
        $projectAccess = $response['projectAccess'] = $request->input('access');
       
        
        $response['resultat'] = projects::create(
            [
                'updated_at' => date('Y-m-d H:i:s'), 
                'created_at' => date('Y-m-d H:i:s'), 
                'name' => $projectName, 
                'comment' => $projectComment,
                'name' => $projectName, 
                'comment' => $projectComment,
                'type' => $projectType,
                'access' => $projectAccess,
                'who_changed' => auth()->user()->id,
            ]
        );       

        return redirect('/project-page/'.$response['resultat']->id);

    }

    public function updateProject(Request $request)
    {
        date_default_timezone_set( 'Europe/Moscow' );

        $projectId = $response['projectId'] = $request->input('id');
        $projectName = $response['projectName'] = $request->input('name');
        $projectComment = $response['projectComment'] = $request->input('comment');
        $projectType = $response['projectType'] = $request->input('type');
        $projectAccess = $response['projectAccess'] = $request->input('access');       
        
        $response['resultat'] = projects::where("id", "=", $projectId)->update(
            [
                'updated_at' => date('Y-m-d H:i:s'), 
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

