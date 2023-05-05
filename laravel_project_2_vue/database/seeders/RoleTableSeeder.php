<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = new Role();        
        $role_admin->name = 'admin';        
        $role_admin->description = 'A admin User';        
        $role_admin->save();        
        $role_operations = new Role();        
        $role_operations->name = 'operations';        
        $role_operations->description = 'A operations User';        
        $role_operations->save();  
    }
}
