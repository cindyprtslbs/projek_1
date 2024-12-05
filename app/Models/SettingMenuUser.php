<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingMenuUser extends Model
{
    protected $table = 'setting_menu_user';
    protected $primaryKey = 'NO_SETTING'; // Primary key tetap sama

    public $timestamps = false;

    protected $fillable = [
        'ID_JENIS_USER',  // foreign key ke jenis_user
        'MENU_ID',        // foreign key ke menu
        'CREATE_BY',
        'CREATE_DATE',
        'UPDATE_BY',
        'UPDATE_DATE',
        'DELETE_MARK',
    ];

    public function jenisUser()
    {
        return $this->belongsTo(JenisUser::class, 'ID_JENIS_USER', 'id'); // foreign key sesuai dengan id tabel jenis_user
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'MENU_ID', 'id'); // foreign key sesuai dengan id tabel menu
    }
}
