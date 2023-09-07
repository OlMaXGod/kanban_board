<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\phase_participants;
use App\Models\project_phase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhaseParticipantsController extends Controller
{
    public function index(Request $request){

        $phaseId = $response['id_phase'] = $request->input('id');

        $response['resultat'] = phase_participants::where('phase_id', '=', $phaseId)->get()->first();

        return $response;

    }

    public function createSubtask(Request $request){

        date_default_timezone_set( 'Europe/Moscow' );
        
        $nameSubtask = $response['nameSubtask'] = $request->input('name');
        $participantSubtask = $response['participantSubtask'] = $request->input('participant');
        $comment = $response['comment'] = $request->input('comment');
        $status = $response['status'] = $request->input('status');
        $fromDate = $response['fromDate'] = $request->input('fromDate')." ".$request->input('fromTime');
        $toDate = $response['toDate'] = $request->input('toDate')." ".$request->input('toTime');
        $phaseID = $response['phaseID'] = $request->input('phaseID');
        $projectID = $response['projectID'] = $request->input('projectID');
     
        $response['resultat'] = phase_participants::insert([
                [
                    'updated_at' => date('Y-m-d H:i:s'), 
                    'created_at' => date('Y-m-d H:i:s'), 
                    'subtask' => $nameSubtask, 
                    'participant_id' => $participantSubtask,
                    'comment' => $comment, 
                    'status' => $status, 
                    'time_frome' => $fromDate,
                    'time_to' => $toDate,
                    'phase_id' => $phaseID,
                    'project_id' => $projectID,
                ]
                ]);

        return back();

    }

    public function updateSubtask(Request $request){
        
        date_default_timezone_set( 'Europe/Moscow' );
        
        $participantSubtask = $response['participantSubtask'] = $request->input('participant');
        $comment = $response['comment'] = $request->input('comment');
        $status = $response['status'] = $request->input('status');
        $fromDate = $response['fromDate'] = $request->input('fromDate')." ".$request->input('fromTime');
        $toDate = $response['toDate'] = $request->input('toDate')." ".$request->input('toTime');
        $participantsID = $response['participantsID'] = $request->input('participantsID');
     
        $response['resultat'] = phase_participants::where('id', $participantsID)
                ->update([
                
                    'updated_at' => date('Y-m-d H:i:s'), 
                    'participant_id' => $participantSubtask,
                    'comment' => $comment, 
                    'status' => $status, 
                    'time_frome' => $fromDate,
                    'time_to' => $toDate,
                
                ]);

            return back();

    }

    public function deleteSubtask(Request $request){
        
        $subtaskId = $response['subtaskId'] = $request->input('subtaskId');
        $backURL = $response['backURL'] = $request->input('backURL');

        $response['resultat'] = phase_participants::where('id', $subtaskId)->delete();

        return $response['resultat'];

    }

    public function updateTask(Request $request){
        
        date_default_timezone_set( 'Europe/Moscow' );
        
        $phaseID = $response['phaseID'] = $request->input('phaseID');
        $comment = $response['comment'] = $request->input('comment');
        $fromDate = $response['fromDate'] = $request->input('fromDate')." ".$request->input('fromTime');
        $toDate = $response['toDate'] = $request->input('toDate')." ".$request->input('toTime');
        $name = $response['name'] = $request->input('name');
     
        $response['resultat'] = project_phase::where('id', $phaseID)
                ->update([
                
                    'updated_at' => date('Y-m-d H:i:s'), 
                    'name' => $name,
                    'comment' => $comment, 
                    'time_frome' => $fromDate,
                    'time_to' => $toDate,
                
                ]);

            return back();

    }

    public function deleteTask(Request $request){
        
        $taskId = $response['taskId'] = $request->input('taskId');

        $response['resultat'] = project_phase::where('id', $taskId)->delete();
        

        return $response['resultat'];

    }

    public function createTask(Request $request){
        
        date_default_timezone_set( 'Europe/Moscow' );
        
        $nameTask = $response['nametask'] = $request->input('name');
        $comment = $response['comment'] = $request->input('comment');
        $fromDate = $response['fromDate'] = $request->input('fromDate')." ".$request->input('fromTime');
        $toDate = $response['toDate'] = $request->input('toDate')." ".$request->input('toTime');
        $projectID = $response['projectID'] = $request->input('projectID');
     
        $response['resultat'] = project_phase::insert([
                [
                    'updated_at' => date('Y-m-d H:i:s'), 
                    'created_at' => date('Y-m-d H:i:s'), 
                    'name' => $nameTask,
                    'comment' => $comment, 
                    'time_frome' => $fromDate,
                    'time_to' => $toDate,
                    'status' => 0,
                    'project_id' => $projectID,
                    'who_changed' => Auth::user()->id,
                ]
                ]);


        return back();

    }

}
