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
        $user = User::create([
            'name' => 'Admin',
            'companyname' => 'Kumberland Inc.',
            'website' => 'https://www.kumberland.com',
            'city_id' => '7',
            'password' => Hash::make('Kumberland@123'),
            'email_verified_at' => now(),
            'verification_code' => sha1(time()),
            'status' => 'active',
            'type' => 'admin'
        ]);
        $user->emails()->create([
            'email' => 'info@kumberland.com',
            'primary' => true
        ]);
        $user->phones()->create([
            'phone' => '+9779860323771',
            'primary' => true
        ]);
        $user = User::create([
            'name' => 'Achyut Neupane',
            'companyname' => 'Kumberland Inc.',
            'website' => 'https://www.kumberland.com',
            'city_id' => '7',
            'password' => Hash::make('Kumberland@123'),
            'email_verified_at' => NULL,
            'verification_code' => sha1(sha1(time())),
            'status' => 'new',
            'type' => 'general_user'
        ]);
        $user->emails()->create([
            'email' => 'aneupane@kumberland.com',
            'primary' => true
        ]);
        $user->phones()->create([
            'phone' => '9860323771',
            'primary' => true
        ]);
        // $user = User::create([
        //     'name' => 'Claude Powell',
        //     'companyname' => 'Kumberland Inc.',
        //     'website' => 'https://www.kumberland.com',
        //     'city_id' => '7',
        //     'password' => Hash::make('Kumberland@123'),
        //     'email_verified_at' => now(),
        //     'verification_code' => sha1(time()),
        //     'status' => 'active',
        //     'type' => 'admin'
        // ]);
        // $user->emails()->create([
        //     'email' => 'claude@kumberland.com',
        //     'primary' => true
        // ]);
        // $user->phones()->create([
        //     'phone' => '5270157',
        //     'primary' => true
        // ]);
    }
}