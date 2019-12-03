<?php


use App\Model\ProjectType;
use Illuminate\Database\Seeder;

class ProjectTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectType::create([
            'name'=>'New Website',
            'sort_order'=>0,
        ]);
        ProjectType::create([
            'name'=>'Application Development',
            'sort_order'=>1,
        ]);
        ProjectType::create([
            'name'=>'Support',
            'sort_order'=>2,
        ]);
        ProjectType::create([
            'name'=>'Internal',
            'sort_order'=>3,
        ]);
    }
}
