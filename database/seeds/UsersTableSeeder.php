<?php

use Illuminate\Database\Seeder;

use App\User;



class UsersTableSeeder extends Seeder {
    public function run () {
        $data = [
            'name'     => 'Tester',
            'email'    => 'tester@tester.com',
            'password' => \Hash::make('123456789')
        ];
        $user = new User;

        $user->fill($data);
        $user->save();
        
    }
}