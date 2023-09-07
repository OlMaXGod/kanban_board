<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProjectPhasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set( 'Europe/Moscow' );

        DB::table('project_phases')->insert([
            'name' => str_random(10),
            'comment' => str_random(10),
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'time_frome' => date('Y-m-d H:i:s', strtotime("+1 day")),
            'time_to' => date('Y-m-d H:i:s', strtotime("+3 days")),
            'project_id' => 1,
            'who_changed' => 1,
        ]);
        DB::table('project_phases')->insert([
            'name' => str_random(10),
            'comment' => str_random(10),
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'time_frome' => date('Y-m-d H:i:s', strtotime("-1 day")),
            'time_to' => date('Y-m-d H:i:s', strtotime("+1 day")),
            'project_id' => 1,
            'who_changed' => 1,
        ]);
        DB::table('project_phases')->insert([
            'name' => str_random(10),
            'comment' => str_random(10),
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'time_frome' => date('Y-m-d H:i:s', strtotime("-3 day")),
            'time_to' => date('Y-m-d H:i:s', strtotime("-1 day")),
            'project_id' => 1,
            'who_changed' => 1,
        ]);
        DB::table('project_phases')->insert([
            'name' => str_random(10),
            'comment' => str_random(10),
            'status' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'time_frome' => date('Y-m-d H:i:s', strtotime("-3 day")),
            'time_to' => date('Y-m-d H:i:s', strtotime("-1 day")),
            'project_id' => 1,
            'who_changed' => 1,
        ]);
    }
}
