<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi_harian extends Model
{
    use HasFactory;

    protected $table = 'transaksi_harians';
    protected $primaryKey = 'NO_RECORDS';
    public $timestamps = false;

    protected $fillable = [
        'STOCK_CODE',
        'DATE_TRANSACTION',
        'OPEN',
        'HIGH',
        'LOW',
        'CLOSE',
        'CHANGE',
        'VOLUME',
        'VALUE',
        'FREQUENCY'
    ];

    public function emitens()
    {
        return $this->belongsTo(emitens::class, 'STOCK_CODE');
    }
}
