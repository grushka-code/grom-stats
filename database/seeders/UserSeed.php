<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Role(['name' => 'admin']))->save();
        $admin = new User();
        $admin->fill([
            'email'    => 'admin@admin.com',
            'password' => Hash::make('password'),
            'name'     => 'admin',
            'email_verified_at' => date('Y-m-d')
        ]);
        $admin->assignRole('admin');
        $admin->save();
    }
}
