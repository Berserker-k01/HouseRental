<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed or update the default admin account.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->updateOrInsert(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'phone' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}
