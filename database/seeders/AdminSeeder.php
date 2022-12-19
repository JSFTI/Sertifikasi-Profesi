<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();

        $admin->name = "Administrator";
        $admin->email = "admin@clubmotormedan@fake.xyz";
        $admin->password = Hash::make('password123');

        $admin->save();
        $admin->attachRole('admin');
    }
}
