<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                "name" => "Admin",
                "surname" => "Admin",
                "email" => "admin@admin.com",
                "password" => "Admin1234",
                "city" => "Valencia",
                "country" => "Spain",
                "role_id" => 1
            ],
            [
                "name" => "Andrea",
                "surname" => "Suarez",
                "email" => "andrea@andrea.com",
                "password" => "Andrea1234",
                "city" => "Valencia",
                "country" => "Spain",
                "role_id" => 2
            ]
        ]);
    }
}
