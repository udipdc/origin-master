<?php

use Illuminate\Database\Seeder;
use App\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
       		['name'=> 'User'],
        	['name'=> 'Role-Permission'],
            ['name'=> 'Blog'],
            ['name'=> 'Gallery'],
            ['name'=> 'Settings'],
	    ];

        foreach ($modules as $module) {
            Module::updateOrCreate(['name' => $module['name']], $module);
        }
    }
}
