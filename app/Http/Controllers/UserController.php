<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\projects;
use App\Models\project_participants;
use App\Models\roles;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class UserController extends Controller
{    
    public function __construct(){
        
        $this->middleware('auth');

    }

    public function index(){

        $id = auth()->user()->id;

        $user = User::find($id);
        $userData = [
            'name' => $user['name'],
            'phone' => $user['phone'],
            'email' => $user['email'],
        ];        
        
        $projects = projects::where('who_changed', '=', $id)->get();
        $projectsData = [];
        foreach($projects as $project){
            $projectsData[$project['id']] = [
                'name' => $project['name'],
                'comment' => $project['comment'],
            ];
        }
        
        $idProjects = array_keys($projectsData);
        $participants = project_participants::whereIn('project_id', $idProjects)
            ->join('users', 'users.id', '=', 'project_participants.participant_id')
            ->join('roles', 'roles.id', '=', 'project_participants.role_id')
            ->select('project_participants.project_id', 'project_participants.id', 'users.name', 'roles.role')
            ->get();
        $participantsData = [];
        foreach($participants as $participant){
            $participantsData[$participant['project_id']][$participant['id']] = [
                'name' => $participant['name'],
                'role' => $participant['role'],
            ];
        }
        
        //dd($userData, $projectsData, $participantsData);

        return view('profile/main', compact('userData', 'projectsData', 'participantsData'));

    }
          
    public function edit(Request $request){

        $data = $request->validate([
            'name' => 'string',
            'phone' => 'string',
            'email' => 'string',
            'phoneOld' => 'string',
            'emailOld' => 'string'
          ]);

        $user = User::where('phone', '=', $data['phoneOld'])
                    ->where('email', '=', $data['emailOld']);

        $user->update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email']
            ]        
        );

        $data = [
            'message' => "Все вроде нормально",
        ];
        return $data;

    }
          
    public function editPassword(Request $request){

        $data = $request->validate([
            'phone' => 'string',
            'email' => 'string',
            'newPassword' => 'string'
          ]
        );

        $user = User::where('phone', '=', $data['phone'])
                    ->where('email', '=', $data['email']);

        $user->update([
            'password' => Hash::make($data['newPassword'])
            ]        
        );

        $data = [
            'message' => "Все вроде нормально",
        ];

        return $data;

    }
          
    public function deleteProject(Request $request){

        $data = $request->validate([
            'id' => 'string'
          ]
        );

        $deleted = projects::find($data['id'])->delete();

        $data = [
            'message' => "Все вроде нормально",
        ];

        return $data;

    }
          
    public function deleteUserFromProject(Request $request){

        $data = $request->validate([
            'id' => 'string'
          ]
        );

        $deleted = projects::where('participant_id', '=', $data['id'])->delete();

        $data = [
            'message' => "Все вроде нормально",
        ];

        return $data;

    }
}
