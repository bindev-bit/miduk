<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Direktur']);
        Role::create(['name' => 'Customer']);

        User::create([
            'nama_perusahaan'                => 'admin',
            'name'                => 'admin',
            'email'                => 'admin@admin.com',
            'password'            => bcrypt('password'),
            'remember_token'    => null,
            'role_id'            => 1,
            'telepon'            => "0812121212",
        ]);
    }
}
