<?php

namespace App\Http\Controllers\Project;

use App\Models\project_participants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');

    }

    public function index(Request $request)
    {        
        $id_participant = $response['id_participant'] = $request->input('id');

        $responce['resultat']  = project_participants::where("id", "=", $id_participant)->get()->first();

        return $responce;
    }

    public function update(Request $request)
    {
        date_default_timezone_set( 'Europe/Moscow' );
        
        $participant_id = $response['id_participant'] = $request->input('id');
        $role_id = $response['id_role'] = $request->input('role');
        $comment = $response['comment'] = $request->input('comment');
        
        $response['resultat'] = project_participants::where("id", "=", $participant_id)
            ->update(['updated_at' => date('Y-m-d H:i:s'), 'role_id' => $role_id, 'comment' => $comment]);

        return $response;
    }

    public function getParticipants(Request $request)
    {
        $projectId = $response['id_project'] = $request->input('id');
        
        $response['resultat'] = project_participants::where('project_id', '=', $projectId)
            ->where('entry_request', '=', 0)
            ->join('users', 'users.id', '=', 'project_participants.participant_id')
            ->select('project_participants.id', 'users.name')
            ->get();

        return $response;
    }

    public function getParticipantsInvited(Request $request)
    {
        $projectId = $response['id_project'] = $request->input('id');
        
        $response['resultat'] = project_participants::where('project_id', '=', $projectId)
            ->where('entry_request', '=', 1)
            ->join('users', 'users.id', '=', 'project_participants.participant_id')
            ->select('project_participants.id', 'users.name')
            ->get();

        return $response;
    } //

    public function addParticipant(Request $request)
    {
        date_default_timezone_set( 'Europe/Moscow' );

        $participant_id = $response['id_participant'] = $request->input('id');
        $role_id = $response['id_role'] = $request->input('role');
        $comment = $response['comment'] = $request->input('comment');
        
        $response['resultat'] = project_participants::where("id", "=", $participant_id)
            ->update(['updated_at' => date('Y-m-d H:i:s'), 'role_id' => $role_id, 'comment' => $comment, 'comment' => $comment, 'entry_request' => 0]);

        return $response;
    }

    public function delete(Request $request)
    {

        $participantId = $response['id_participant'] = $request->input('id');
        
        $response['resultat'] = project_participants::find($participantId)->delete();

        return $response;

    }
}
