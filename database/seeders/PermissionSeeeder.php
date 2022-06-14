<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role.list'=>'To view all role list.',
            'role.create'=>'To view create role page.',
            'role.store'=>'To add new role to database.',
            'role.edit'=>'To view role edit page.',
            'role.update'=>'To update specific role update.',
            'role.delete'=>'To delete specific role.',
            'role.add_permission'=>'To view add permissions to the specific role.',

        ];
    }
}
