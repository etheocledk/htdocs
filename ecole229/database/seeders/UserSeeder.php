<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Blog;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
            "firsname" => "SUPER",
            "lastname"=>"ADMIN",
            "email"=>"adminecole29@hotmail.com",
            "password"=>Hash::make("SuperAdmin12@"),
            "verify_at"=> now(),
            "email_verified"=>true
        ];
        User::create($data);
        
    }
}
