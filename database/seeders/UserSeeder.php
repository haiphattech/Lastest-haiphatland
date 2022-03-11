<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 's-admin',
            'username' => 'hpl-admin',
            'email' => 'admin2022@gmail.com',
            'password' => Hash::make('H@iPL2022'),
            'is_admin' => 1,
        ]);

    }
}
