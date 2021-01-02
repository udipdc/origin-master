<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $users =[
            [
                'firstname' => 'Admin',
                'lastname' => 'User',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => Hash::make("Admin@123"),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($users as $user) {
            $userData = User::updateOrCreate(['username' => $user['username']], $user);
            $role = Role::where('name' , 'Admin')->first();
            $permissions = Permission::pluck('id','id')->all();
            $role->syncPermissions($permissions);
            $userData->syncRoles($role->id);
        }
    }
}
