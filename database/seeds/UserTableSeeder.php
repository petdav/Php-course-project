<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Luodaan feikkikäyttäjät
        factory('App\User', 2)->create();
        // Luodaan "oikea" käyttäjä
        factory('App\User')->create([
            'name' => 'Petteri Davidsson',
            'email' => 'petteridavidsson@gmail.com',
            'password' => bcrypt('salasana')
        ]);
        // Annetaan "oikealle" käyttäjällä admin -rooli
        User::find(3)->roles()->attach(Role::first());
    }
}