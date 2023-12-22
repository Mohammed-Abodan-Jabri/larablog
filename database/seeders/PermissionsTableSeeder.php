<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        Permission::create([
            'name' => 'access-dashboard',
            'label' => 'Access Dashboard',
        ]);
        Permission::create([
            // edit just own
            'name' => 'edit-own-content',
            'label' => 'Edit Own Content',
        ]);
        Permission::create([
            // edit just any

            'name' => 'edit-any-content',
            'label' => 'Edit Any Content',
        ]);

        // Create additional permissions as needed
        // ...
    }
}
