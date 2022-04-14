<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        $user->name = "Firman Santosa";
        $user->email = "admin@sifirman.com";
        $user->password = bcrypt('firman88');
        $user->save();

        $user = new User;
        $user->name = "Administrator";
        $user->email = "admin@admin.com";
        $user->password = bcrypt('admin');
        $user->save();
    }
}
