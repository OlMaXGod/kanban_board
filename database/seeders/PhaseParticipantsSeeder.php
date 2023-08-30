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
            'participant_id' => 1,
        ]);
    }
}
