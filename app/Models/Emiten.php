<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emiten extends Model
{
    use HasFactory;

    protected $table = 'emitens';
    protected $primaryKey = 'STOCK_CODE';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'STOCK_CODE',
        'STOCK_NAME',
        'SHARED',
        'SEKTOR'
    ];

    public function transaksi_harian()
    {
        return $this->hasMany(transaksi_harian::class, 'STOCK_CODE');
    }
}
