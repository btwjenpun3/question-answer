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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Muhamad Helmi',
            'email' => 'muhamadkelmi@gmail.com',
            'password' => bcrypt('M3g4bl00d2018!@#')
        ]);

        \App\Models\Category::create([
            'name' => 'Kebidanan & Kandungan',
            'slug' => 'kebidanan-kandungan'
        ]);

        \App\Models\Category::create([
            'name' => 'Anak',
            'slug' => 'anak'
        ]);

        \App\Models\Category::create([
            'name' => 'Umum',
            'slug' => 'umum'
        ]);

        \App\Models\Category::create([
            'name' => 'Kecantikan',
            'slug' => 'kecantikan'
        ]);
        
    }
}
