<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\project_phase;
use Illuminate\Http\Request;

class ProjectPhaseController extends Controller
{
    public function index(Request $request){

        $projectId = $response['id_project'] = $request->input('id');

        $response['resultat'] = project_phase::where('project_id', '=', $projectId)->get()->first();

        return $response;

    }
}
