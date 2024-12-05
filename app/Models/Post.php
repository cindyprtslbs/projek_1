<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posting';
    protected $primaryKey = 'POSTING_ID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'SENDER',
        'MESSAGE_TEXT',
        'CREATE_BY',
        'CREATE_DATE',
        'UPDATE_BY',
        'DELETE_MARK'
    ];

    public function likes()
    {
        return $this->hasMany(Like::class, 'POSTING_ID', 'POSTING_ID');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'POSTING_ID', 'POSTING_ID');
    }
}
