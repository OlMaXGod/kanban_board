<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProjectParticipantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_participants')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'project_id' => 1,
            'participant_id' => 2,
            'role_id' => 3,
            'comment' => str_random(10),
            'entry_request' => false,
        ]);
        DB::table('project_participants')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'project_id' => 1,
            'participant_id' => 1,
            'role_id' => 1,
            'comment' => str_random(10),
            'entry_request' => false,
        ]);

        DB::table('project_participants')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'project_id' => 2,
            'participant_id' => 2,
            'role_id' => 3,
            'comment' => 'Новый участник',
            'entry_request' => true,
        ]);

        DB::table('project_participants')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'project_id' => 3,
            'participant_id' => 2,
            'role_id' => 3,
            'comment' => 'Новый участник',
            'entry_request' => true,
        ]);
        DB::table('project_participants')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'project_id' => 3,
            'participant_id' => 3,
            'role_id' => 3,
            'comment' => 'Новый участник по ссылке',
            'entry_request' => true,
        ]);
    }
}
