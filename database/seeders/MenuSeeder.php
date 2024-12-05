<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu')->insert([
            [
                'menu_name' => 'Menejemen User',
                'menu_link' => '/user-menejemen',
                'menu_icon' => 'icon-layout menu-icon',
                'parent_id' => '1',
                'create_by' => 1,
                'create_date' => now(),
                'update_by' => 1,
                'update_date' => now(),
            ],
            [
                'menu_name' => 'Setting',
                'menu_link' => '/setting',
                'menu_icon' => 'icon-layout menu-icon',
                'parent_id' => '1',
                'create_by' => 1,
                'create_date' => now(),
                'update_by' => 1,
                'update_date' => now(),
            ],
            [
                'menu_name' => 'Menejemen Menu',
                'menu_link' => '/menu-management',
                'menu_icon' => 'icon-layout menu-icon',
                 'parent_id' => '1',
                 'create_by' => 1,
                'create_date' => now(),
                'update_by' => 1,
                'update_date' => now(),
            ],
            [
                'menu_name' => 'Berita terkini',
                'menu_link' => '/berita',
                'menu_icon' => 'icon-layout menu-icon',
                 'parent_id' => '1',
                 'create_by' => 1,
                'create_date' => now(),
                'update_by' => 1,
                'update_date' => now(),
            ],
            [
                'menu_name' => 'Koleksi Buku',
                'menu_link' => '/koleksibuku',
                'menu_icon' => 'icon-layout menu-icon',
                 'parent_id' => '1',
                 'create_by' => 1,
                'create_date' => now(),
                'update_by' => 1,
                'update_date' => now(),
            ],
            [
                'menu_name' => 'Daftar User',
                'menu_link' => '/daftaruser',
                'menu_icon' => 'icon-layout menu-icon',
                'parent_id' => '1',
                'create_by' => 1,
                'create_date' => now(),
                'update_by' => 1,
                'update_date' => now(),
            ],
        ]);

        // foreach ($menus as $menu) {
        //     Menu::create($menu);
        // }
    }
}

