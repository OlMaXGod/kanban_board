<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\projects;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class UserController extends Controller
{    
    public function __construct(){
        
        $this->middleware('auth');

    }

    public function index($id){

        $user = User::find($id);
        //$projects = projects::find($id);

        $projects = projects::where('who_changed', '=', $id);

        $userData = [
            'name' => $user['name'],
            'phone' => $user['phone'],
            'email' => $user['email'],
        ];
        
        $projectsData = [];

        foreach($projects as $project){
            $projectsData[$projects['id']] = [
                'name' => $projects['name'],
                'comment' => $projects['comment'],
            ];
        }
        
        dd($projects);

        //return view('profile/main', compact('userData', 'projectsData'));

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

        //'password' => password_hash($data['pass'], PASSWORD_BCRYPT, $options)
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
}
