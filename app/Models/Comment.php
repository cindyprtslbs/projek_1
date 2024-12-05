<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'POSTING_KOMENTAR';
    protected $primaryKey = 'KOMEN_ID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'KOMEN_ID',
        'POSTING_ID',
        'USER_ID',
        'KOMENTAR_TEXT',
        'KOMENTAR_GAMBAR',
        'CREATE_BY',
        'CREATE_DATE',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'POSTING_ID', 'POSTING_ID');
    }
    public function user() {
        return $this->belongsTo(User::class, 'USER_ID', 'id');
    }
}
