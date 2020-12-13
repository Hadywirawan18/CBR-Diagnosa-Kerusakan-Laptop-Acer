<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usr = new User;
        $usr->name = "root";
        $usr->username = "root";
        $usr->address = "adm";
        $usr->phone = "123456";
        $usr->role = "root";
        $usr->password = Hash::make("root");
        $usr->save();
    }
}
