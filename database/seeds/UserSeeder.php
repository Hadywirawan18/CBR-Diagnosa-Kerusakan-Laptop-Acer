<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => "Site Administrator",
                "username" => "admin",
                "password" => \Hash::make("admin"),
                "role" => "admin",
                "phone" => "1234567890",
                "address" => "Mataram"
            ],
            [
                "name" => "Site User",
                "username" => "user",
                "password" => \Hash::make("user"),
                "role" => "user",
                "phone" => "1234567890",
                "address" => "Mataram"
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
