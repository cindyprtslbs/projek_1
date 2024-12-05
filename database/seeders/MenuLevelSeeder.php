<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\MenuLevel;

class MenuLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu_level')->insert([
            [
                'level' => 'level1',
                'create_by' => 'system',
                'create_date' => now(),
                'update_by' => 'admin',
                'update_date' => now(),
            ],
            [
                'level' => 'level1',
                'create_by' => 'system',
                'create_date' => now(),
                'update_by' => 'admin',
                'update_date' => now(),
            ],
            [
                'level' => 'level1',
                'create_by' => 'system',
                'create_date' => now(),
                'update_by' => 'admin',
                'update_date' => now(),
            ],
        ]);
    }
}
