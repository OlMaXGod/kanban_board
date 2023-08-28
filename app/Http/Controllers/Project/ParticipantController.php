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

        $responce = project_participants::where("id", "=", $data['id'])->get()->first();;

        return $responce;
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'int',
            'role' => 'string',
            'comment' => 'string'
          ]
        );

        $user = project_participants::where("id", "=", $data['id'])
            ->update([
                'role_id' => $data['role'],
                'comment' => $data['comment']
                ]
            );

        $data = [
            'message' => "Все вроде нормально",
        ];
        return $data;
    }

    public function getParticipants(Request $request)
    {
        $data = $request->validate([
            'id' => 'int'
          ]
        );

        return project_participants::where('project_id', '=', $data['id'])
            ->join('users', 'users.id', '=', 'project_participants.participant_id')
            ->select('project_participants.id', 'users.name')
            ->get();
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
