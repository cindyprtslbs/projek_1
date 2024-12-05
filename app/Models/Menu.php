<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    protected $fillable =[
        'menu_name',
        'menu_link',
        'menu_icon',
        'id_level',
        'parent_id',
    ];

    public function settingMenuUsers()
    {
        return $this->hasMany(SettingMenuUser::class, 'no_setting');
    }
    public function level()
    {
        return $this->belongsTo(MenuLevel::class, 'id_level');
    }

    public function isAccessibleFor(User $user)
    {
        // Hanya user dengan role yang sesuai yang bisa mengakses menu
        return $this->menu_level->id == $user->role;
    }
}
