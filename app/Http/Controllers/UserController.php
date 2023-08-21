<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\projects;
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
        
        $projects = projects::where('who_changed', '=', $id)->get();

        $userData = [
            'name' => $user['name'],
            'phone' => $user['phone'],
            'email' => $user['email'],
        ];
        
        $projectsData = [];

        foreach($projects as $project){
            $projectsData[$project['id']] = [
                'name' => $project['name'],
                'comment' => $project['comment'],
            ];
        }
        
        //dd($userData, $projectsData);

        return view('profile/main', compact('userData', 'projectsData'));

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
}
