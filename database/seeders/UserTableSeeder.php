<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'username'  => 'admin',
            'name'      => 'Administrator',
            'password'  => '$2y$10$zx7ozLOIaKgaBTvcjSqH3.4byWRGFSq253bY2FMvjVPi/rXsjNngS',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=> \Carbon\Carbon::now()
        ]);
    }
}
