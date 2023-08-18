<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(){

        $data = request()->validate([
            'id' => 'int',
        ]);

        $result = DB::table('users')
            ->select('id','name','email')
            ->where('id', '=', $data['id'])
            ->get();

        $result = json_decode($result, true)[0];

        $userData = [
            'name' => $result['name'],
            'number' => "89998887766",
            'email' => $result['email'],
        ];
        return view('profile/main', compact('userData'));
    }
          
    public function edit(){

        $data = request()->validate([
            'id' => 'int',
            'number' => 'string',
            'email' => 'string',
        ]);

        return 1;
        //'password' => password_hash($data['pass'], PASSWORD_BCRYPT, $options)
        DB::table('users')
              ->where('id', '=', $data['id'])
              ->update(['name' => $data['name'],'email' => $data['email']]
        );

        $data = [
            'message' => "Все вроде нормально",
        ];
        return $data;
    }
}
