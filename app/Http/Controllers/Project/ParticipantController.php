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
        $data = $request->validate([
            'id' => 'int'
          ]
        );

        $participants = project_participants::where('project_id', '=', $data['id'])
            ->join('users', 'users.id', '=', 'project_participants.participant_id')
            ->join('roles', 'roles.id', '=', 'project_participants.role_id')
            ->select('project_participants.id', 'users.name', 'roles.role')
            ->get();

        $participantsData = [];
        foreach($participants as $participant){
            $participantsData[$participant['id']] = [
                'name' => $participant['name'],
                'role' => $participant['role'],
            ];
        }

        return $participantsData;
    }

    public function delete(Request $request)
    {

        $data = $request->validate([
            'id' => 'int'
          ]
        );

        $deleted = project_participants::find($data['id'])->delete();

        $data = [
            'message' => "Все вроде нормально",
        ];

        return $data;

    }
}
