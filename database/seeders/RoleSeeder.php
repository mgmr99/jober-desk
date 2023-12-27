<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $admin = Role::create(['name' => 'admin']);
        // $user = Role::create(['name' => 'user']);
        // $reviewer = Role::create(['name' => 'reviewer']);

        // $admin = Role::where('name', 'admin')->first();
        // $admin->revokePermissionTo('publish_job');
        // $user = Role::where('name', 'user')->first();
        // $reviewer = Role::where('name', 'reviewer')->first();
        // $user->givePermissionTo([
        //     'read_job',
        //     'apply_job',
        // ]);
        // $reviewer->givePermissionTo([
        //     'read_job',
        //     'edit_job',
        //     'publish_job',
        //     'apply_job',
        // ]);
    }
    
}
