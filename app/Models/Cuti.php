<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cutis';
    
    protected $fillable = [
        'karyawan_id',
        'tanggal_cuti',
        'jumlah_cuti',   
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id');
    }
}
