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
        date_default_timezone_set( 'Europe/Moscow' );

        DB::table('projects')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'name' => str_random(10),
            'comment' => str_random(10),
            'type' => 1,
            'access' => 1,
            'who_changed' => 1,
        ]);
        DB::table('projects')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'name' => str_random(10),
            'comment' => str_random(10),
            'type' => 1,
            'access' => 1,
            'who_changed' => 1,
        ]);
        DB::table('projects')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'name' => str_random(10),
            'comment' => str_random(10),
            'type' => 1,
            'access' => 1,
            'who_changed' => 1,
        ]);
        DB::table('projects')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'name' => str_random(10),
            'comment' => str_random(10),
            'type' => 1,
            'access' => 1,
            'who_changed' => 1,
        ]);
        
       
    }
}
