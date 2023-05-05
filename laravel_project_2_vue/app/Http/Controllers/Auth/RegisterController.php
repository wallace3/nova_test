
<?php

use App\Models\Role;
class RegisterController extends Controller{
    protected function create(array $data){   

        $user = User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password' => bcrypt($data['password']),
        ]);    

        $user->roles()->attach(Role::where('name', 'admin')->first());
        return $user;
    }
}