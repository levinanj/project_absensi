<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Berfungsi untuk mengisi data awal ke database seperti pengaturan default.
     * atau digunakan untuk referensi pengisian data
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'guru@absen.com')->exists()) {
            User::create([
                'name' => 'Nama Guru',
                'email' => 'guru@absen.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('password'),
                'role' => 'Admin'
            ]);
        }
        $this->call(SettingSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
