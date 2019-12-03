<?php

use App\Mmodel\ProjectStatus;
use Illuminate\Database\Seeder;

class ProjectStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectStatus::create([
            'name'=>'Open',
            'sort_order'=>0,
        ]);
        ProjectStatus::create([
            'name'=>'Onhold',
            'sort_order'=>1,
        ]);
        ProjectStatus::create([
            'name'=>'Closed',
            'sort_order'=>2,
        ]);
        ProjectStatus::create([
            'name'=>'Cancelled',
            'sort_order'=>3,
        ]);
    }
}
