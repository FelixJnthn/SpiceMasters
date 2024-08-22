<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('difficulties')->insert([
            'name' => 'easy',
        ]);
        DB::table('difficulties')->insert([
            'name' => 'medium',
        ]);
        DB::table('difficulties')->insert([
            'name' => 'hard',
        ]);
    }
}
