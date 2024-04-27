<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(User $user): void
    {
        // $user->name = 'Karyawan';
        // $user->email = 'karyawan@gmail.com';
        // $user->password = Hash::make('12345678');
        // $user->role_id = 3;
        // $user->karyawan_id = 1;
        // $user->save();

        // $user->name = 'Accounting';
        // $user->email = 'accounting@gmail.com';
        // $user->password = Hash::make('12345678');
        // $user->role_id = 2;
        // $user->karyawan_id = 3;
        // $user->save();

        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->role_id = 1;
        $user->karyawan_id = 2;
        $user->save();
    }
}
