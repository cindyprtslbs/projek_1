<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\JenisUser;

class JenisUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_user')->delete();

        DB::table('jenis_user')->insert([
            ['id' => 1, 'jenis_user' => 'Admin'],
            ['id' => 2, 'jenis_user' => 'Guest'],
            ['id' => 3, 'jenis_user' => 'Mahasiswa'],
        ]);
    }
}
