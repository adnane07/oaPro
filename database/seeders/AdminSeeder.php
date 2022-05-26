<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'ihab',
            'role'=>'1',
            'email'=> 'ihabAdmin@gmail.com',
            'password'=>Hash::make('admin123456')
        ]);
    }
}
