<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Employer::create([
        DB::table('employers')->insert([
            'id' => '7',
            'user' => 'abc',
            'pass' => '123456'

        // \App\Models\User::factory(10)->create();
        //\App\Models\User::create([
            //        'name' => 'Test User',
              //      'email' => 'test@example.com',
        ]);
    }
}
