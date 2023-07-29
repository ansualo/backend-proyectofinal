<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoleSeeder::class
        ]);

        $this->call([
            UserSeeder::class
        ]);
        
        \App\Models\User::factory(10)->create();

        $this->call([
            PlantSeeder::class
        ]);

        \App\Models\MyPlant::factory(5)->create();

        \App\Models\WateringDate::factory(5)->create();


    }
}
