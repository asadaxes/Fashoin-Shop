<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'Super',
            'last_name' => 'User',
            'avatar' => 'avatars/default_avatar.png',
            'email' => 'admin@gmail.com',
            'phone' => '+880123456789',
            'password' => bcrypt('admin123'),
            'address_1' => 'somewhere in earth',
            'address_2' => null,
            'city' => 'Dhaka',
            'flag' => 'bd',
            'country' => 'Bangladesh',
            'state' => 'Dhaka',
            'zip_code' => '1216',
            'shipping_address' => '',
            'is_active' => true,
            'is_admin' => true,
            'joined_date' => now(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}