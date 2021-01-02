<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           	[
	            'name'=> 'create_Role-Permission',
	            'guard_name'=> 'admin'
            ],
        	[
	            'name'=> 'edit_Role-Permission',
	            'guard_name'=> 'admin'
            ],
        	[
	            'name'=> 'delete_Role-Permission',
	            'guard_name'=> 'admin'
            ],
        	[
	            'name'=> 'view_Role-Permission',
	            'guard_name'=> 'admin'
            ]
        ];
   
        foreach ($permissions as $permission) {
             Permission::updateOrCreate(['name' => $permission['name']],$permission);
        }
    }
}