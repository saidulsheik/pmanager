<?php

use App\Model\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'Super Admin',
        ]);
        Role::create([
            'name'=>'Admin',
        ]);
        Role::create([
            'name'=>'Manager',
        ]);
        Role::create([
            'name'=>'Stuff',
        ]);
    }
}
