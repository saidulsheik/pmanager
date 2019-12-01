<?php

use App\Model\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::create([
        //     'name'=>'Super Admin',
        // ]);
        Company::create([
            'name'=>'IT',
            'description'=>'Information Technology',
        ]);
        Company::create([
            'name'=>'HR & ADMIN',
            'description'=>'Human Resource & Administration',
        ]);
        Company::create([
            'name'=>'ACCOUNTS & FINANCE',
            'description'=>'Accounts & Finance',
        ]);
    }
}
