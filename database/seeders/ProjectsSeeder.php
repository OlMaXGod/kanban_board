<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'name' => str_random(10),
            'comment' => str_random(10),
            'role_id' => 1,
            'type_id' => 1,
            'who_changed' => 1,
        ]);
        DB::table('projects')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'name' => str_random(10),
            'comment' => str_random(10),
            'role_id' => 1,
            'type_id' => 1,
            'who_changed' => 1,
        ]);
        
        DB::table('projects')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'name' => str_random(10),
            'comment' => str_random(10),
            'role_id' => 1,
            'type_id' => 1,
            'who_changed' => 1,
        ]);
        DB::table('projects')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'name' => str_random(10),
            'comment' => str_random(10),
            'role_id' => 1,
            'type_id' => 1,
            'who_changed' => 1,
        ]);
        DB::table('projects')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'name' => str_random(10),
            'comment' => str_random(10),
            'role_id' => 1,
            'type_id' => 1,
            'who_changed' => 1,
        ]);
        DB::table('projects')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'name' => str_random(10),
            'comment' => str_random(10),
            'role_id' => 1,
            'type_id' => 1,
            'who_changed' => 1,
        ]);
        DB::table('projects')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'name' => str_random(10),
            'comment' => str_random(10),
            'role_id' => 1,
            'type_id' => 1,
            'who_changed' => 1,
        ]);
        DB::table('projects')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'name' => str_random(10),
            'comment' => str_random(10),
            'role_id' => 1,
            'type_id' => 1,
            'who_changed' => 1,
        ]);
    }
}
