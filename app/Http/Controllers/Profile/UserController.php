<?php

namespace App\Http\Controllers\Profile;

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

        $userData = User::find($id);

        return view('profile/main', compact('userData'));

    }
          
    public function update(Request $request){

        $name = $response['name'] = $request->input('name');
        $phone = $response['phone'] = $request->input('phone');
        $email = $response['email'] = $request->input('email');
        $phone_old = $response['phone_old'] = $request->input('phone_old');
        $email_old = $response['email_old'] = $request->input('email_old');

        $response['resultat'] = User::where('phone', '=', $phone_old)
                                    ->where('email', '=', $email_old)
                                    ->update(['name' => $name, 'phone' => $phone, 'email' => $email]);

        return $response;

    }
          
    public function updatePassword(Request $request){
        
        $phone = $response['phone'] = $request->input('phone');
        $email = $response['email'] = $request->input('email');
        $newPassword = $response['newPassword'] = $request->input('newPassword');

        $response['resultat'] = User::where('phone', '=', $phone)
                                    ->where('email', '=', $email)
                                    ->update(['password' => Hash::make($newPassword)]);

        return $response;

    }
          
    public function deleteUserFromProject(Request $request){
        
        $userId = $response['id_user'] = $request->input('id');
        
        $response['resultat'] = projects::where('participant_id', '=', $userId)->delete();

        return $response;

    }
}
