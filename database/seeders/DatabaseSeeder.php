<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Menu;
use App\Models\PresenceHoraire;
use App\Models\Secteur;
use App\Models\SupervisionControlElement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('actions') as $item) {
            $entity = $item['entity'];

            foreach ($item['actions'] as $actionName) {
                Permission::firstOrCreate([
                    'name' => "{$entity}.{$actionName}",
                    'guard_name' => 'web'
                ]);
            }
        }
        $user = \App\Models\User::updateOrCreate(
            ['email'=>'admin@mb.c'],
            [
             'name' => 'Mamba ADM',
             'role' => 'admin',
             'email' => 'admin@mb.c',
             'password'=>bcrypt('123456'),
         ]);

        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $user->assignRole($roleAdmin);
    }
}
