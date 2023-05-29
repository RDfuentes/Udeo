<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name' => 'Ronald Fuentes',
            'email' => 'rdfuentes@acredicom.com.gt',
            'password' => \Hash::make('1234'),
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }
}
