<?php

use Illuminate\Database\Seeder;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create(['name' => 'admin', 'label' => 'Sites admin']);
        \App\Permission::create(['name' => 'can-add-posts', 'label' => 'Can add posts']);
        \App\Role::first()->permissions()->attach(\App\Permission::first());
    }
}