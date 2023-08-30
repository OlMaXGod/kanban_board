<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\phase_participants;
use Illuminate\Http\Request;

class PhaseParticipantsController extends Controller
{
    public function index(Request $request){

        $phaseId = $response['id_phase'] = $request->input('id');

        $response['resultat'] = phase_participants::where('phase_id', '=', $phaseId)->get()->first();

        return $response;

    }
}
