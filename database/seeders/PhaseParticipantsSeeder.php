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
        date_default_timezone_set( 'Europe/Moscow' );

        DB::table('phase_participants')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'phase_id' => 1,
            'subtask' => 'Разработка шапки сайта',
            'comment' => "Разработка дизайна шапки сайта, и его вёрстка",
            'status' => 0,
            'time_frome' => date('Y-m-d H:i:s', strtotime("+1 hours")),
            'time_to' => date('Y-m-d H:i:s', strtotime("+1 day")),
            'project_id' => 1,
            'participant_id' => 1,
        ]);
        DB::table('phase_participants')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'phase_id' => 1,
            'subtask' => 'Разработка шапки сайта',
            'comment' => "Разработка дизайна шапки сайта, и его вёрстка",
            'status' => 1,
            'time_frome' => date('Y-m-d H:i:s', strtotime("-1 day")),
            'time_to' => date('Y-m-d H:i:s', strtotime("+1 day")),
            'project_id' => 1,
            'participant_id' => 1,
        ]);
        DB::table('phase_participants')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'phase_id' => 1,
            'subtask' => 'Разработка шапки сайта',
            'comment' => "Разработка дизайна шапки сайта, и его вёрстка",
            'status' => 1,
            'time_frome' => date('Y-m-d H:i:s', strtotime("-1 day")),
            'time_to' => date('Y-m-d H:i:s', strtotime("+1 hours")),
            'project_id' => 1,
            'participant_id' => 1,
        ]);
        DB::table('phase_participants')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'phase_id' => 1,
            'subtask' => 'Разработка подвала сайта',
            'comment' => "Разработка дизайна подвала сайта, и его вёрстка",
            'status' => 1,
            'time_frome' => date('Y-m-d H:i:s', strtotime("-1 day")),
            'time_to' => date('Y-m-d H:i:s', strtotime("-1 day")),
            'project_id' => 1,
            'participant_id' => 2,
        ]);
        DB::table('phase_participants')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'phase_id' => 1,
            'subtask' => 'Разработка подвала сайта',
            'comment' => "Разработка дизайна подвала сайта, и его вёрстка",
            'status' => 2,
            'time_frome' => date('Y-m-d H:i:s', strtotime("-1 day")),
            'time_to' => date('Y-m-d H:i:s', strtotime("-1 day")),
            'project_id' => 1,
            'participant_id' => 2,
        ]);

    }
}
