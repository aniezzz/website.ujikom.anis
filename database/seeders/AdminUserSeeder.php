<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Website SMKN 4 Bogor',
            'email' => 'admin@website-smkn4bogor.sch.id',
            'password' => Hash::make('Web!Admin4#2026'),
        ]);
    }
}