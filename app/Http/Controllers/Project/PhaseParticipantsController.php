<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\phase_participants;
use App\Models\project_phase;
use Illuminate\Http\Request;

class PhaseParticipantsController extends Controller
{
    public function index(Request $request){

        $phaseId = $response['id_phase'] = $request->input('id');

        $response['resultat'] = phase_participants::where('phase_id', '=', $phaseId)->get()->first();

        return $response;

    }

    public function createSubtask(Request $request){
        
        $nameSubtask = $response['nameSubtask'] = $request->input('name');
        $participantSubtask = $response['participantSubtask'] = $request->input('participant');
        $comment = $response['comment'] = $request->input('comment');
        $fromDate = $response['fromDate'] = $request->input('fromDate')." ".$request->input('fromTime');
        $toDate = $response['toDate'] = $request->input('toDate')." ".$request->input('toTime');
        $phaseID = $response['phaseID'] = $request->input('phaseID');
        $projectID = $response['projectID'] = $request->input('projectID');
     
        $response['resultat'] = phase_participants::insert([
                [
                    'subtask' => $nameSubtask, 
                    'participant_id' => $participantSubtask,
                    'comment' => $comment, 
                    'time_frome' => $fromDate,
                    'time_to' => $toDate,
                    'phase_id' => $phaseID,
                    'project_id' => $projectID,
                ]
                ]);

        return back();

    }

    public function updateSubtask(Request $request){
        
        $participantSubtask = $response['participantSubtask'] = $request->input('participant');
        $comment = $response['comment'] = $request->input('comment');
        $fromDate = $response['fromDate'] = $request->input('fromDate')." ".$request->input('fromTime');
        $toDate = $response['toDate'] = $request->input('toDate')." ".$request->input('toTime');
        $participantsID = $response['participantsID'] = $request->input('participantsID');
     
        $response['resultat'] = phase_participants::where('id', $participantsID)
                ->update([
                
                    'participant_id' => $participantSubtask,
                    'comment' => $comment, 
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
}
