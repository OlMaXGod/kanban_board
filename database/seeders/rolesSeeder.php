<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;

class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set( 'Europe/Moscow' );

        DB::table('roles')->insert(
            [
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
               'role' => "Администратор",
               'comment' => str_random(10),
               'who_changed' => 1,
            ]);
            DB::table('roles')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'role' => "Разработчик",
                'comment' => str_random(10),
                'who_changed' => 1,
            ]);
             DB::table('roles')->insert( [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'role' => "Менеджер",
                'comment' => str_random(10),
                'who_changed' => 1,
             ]
    );
    }
}
