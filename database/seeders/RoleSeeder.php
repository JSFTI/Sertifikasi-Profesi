<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Role::where('name', 'admin')->first()){
            Role::create([
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Akun administrator, dapat melakukan apapun dalam panel admin'
            ]);
        }

        if(!Role::where('name', 'staff')->first()){
            Role::create([
                'name' => 'staff',
                'display_name' => 'Staff',
                'description' => 'Akun staff, dibuat oleh administrator. Dapat membuat artikel, event, dan galeri'
            ]);
        }

        if(!Role::where('name', 'member')->first()){
            Role::create([
                'name' => 'member',
                'display_name' => 'Member',
                'description' => 'Akun biasa.'
            ]);
        }
    }
}
