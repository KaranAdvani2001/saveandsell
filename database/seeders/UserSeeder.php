<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
            'first_name'            => 'Mr.',
            'last_name'             => 'Admin',
            'telephone_number'      => '+8801515000000',
            'email'                 => 'admin@gmail.com',
            'password'              => Hash::make(123456),
            'is_admin'              => 1,
            'address_line1'         => 'Narail',
            'address_line2'         => 'Narail Sadar',
            'post_code'             => '1600',
            'city'                  => 'Dhaka',
            'country'               => 'Bangladesh',
        ]);
    }
}
