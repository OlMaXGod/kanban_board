<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PhaseParticipantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phase_participants')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'phase_id' => 1,
            'subtask' => 'Разработка шапки сайта',
            'comment' => "Разработка дизайна шапки сайта, и его вёрстка",
            'time_frome' => date('Y-m-d h:i:s', strtotime("-1 day")),
            'time_to' => date('Y-m-d h:i:s', strtotime("+1 day")),
            'project_id' => 1,
            'participant_id' => 1,
        ]);
        DB::table('phase_participants')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'phase_id' => 1,
            'subtask' => 'Разработка подвала сайта',
            'comment' => "Разработка дизайна подвала сайта, и его вёрстка",
            'time_frome' => date('Y-m-d h:i:s', strtotime("-1 day")),
            'time_to' => date('Y-m-d h:i:s', strtotime("+1 day")),
            'project_id' => 1,
            'participant_id' => 2,
        ]);
        DB::table('phase_participants')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'phase_id' => 3,
            'subtask' => 'Разработка тела сайта',
            'comment' => "Разработка дизайна тела сайта, и его вёрстка",
            'time_frome' => date('Y-m-d h:i:s', strtotime("-1 day")),
            'time_to' => date('Y-m-d h:i:s', strtotime("+1 day")),
            'project_id' => 1,
            'participant_id' => 3,
        ]);
    }
}
