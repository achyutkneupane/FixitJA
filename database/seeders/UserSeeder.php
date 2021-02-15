<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'info@kumberland.com',
            'phone' => '+9779860323771',
            'companyname' => 'Kumberland Inc.',
            'city_id' => '7',
            'password' => Hash::make('Kumberland@123'),
            'email_verified_at' => now(),
            'verification_code' => sha1(time()),
            'status' => 'active',
            'type' => 'admin'

        ]);
    }
}