<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
        	'name' => 'Rajib Mondal',
        	'email' => 'rajib.3t@gmail.com',
            'mobile'=>'8282817714',
        	'password' => Hash::make('123456789'),
        ]);
        $role = Role::create([
            'name'=>'Super Admin',
            'guard_name'=>'admin'
        ]);

        $user->assignRole('Super Admin');
    }
}
