<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin= Role::where('name', 'admin')->first();        
        $role_operations = Role::where('name', 'operations')->first();        
        $admin = new User();        
        
        $admin->name = 'admin';        
        $admin->email = 'admin@admin.com';        
        $admin->password = bcrypt('secret');        
        $admin->save();
        
        $admin->roles()->attach($role_admin);        
        $operations = new User();        
        $operations->name = 'operator';        
        $operations->email = 'operations@operator.com';        
        $operations->password = bcrypt('secret');        
        $operations->save();        
        $operations->roles()->attach($role_operations); 
    }
}
