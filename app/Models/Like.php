<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'posting_like';
    protected $primaryKey = 'LIKE_ID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'LIKE_ID',
        'POSTING_ID',
        'USER_ID',
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
