<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUser extends Model
{
    use HasFactory;

    protected $table = 'jenis_user';

    protected $fillable = [
        'nama',
        'jenis_user',
    ];

    public $timestamps = true;

    // public function users()
    // {
    //     return $this->hasMany(User::class, 'id_jenis_user');
    // }

    public function users()
    {
        return $this->hasMany(User::class, 'id_jenis_user');
    }

    public function settingMenuUsers()
    {
        return $this->hasMany(SettingMenuUser::class, 'id_jenis_user');
    }

}
