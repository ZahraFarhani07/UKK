<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;

class Lembur extends Model
{
    use HasFactory;

    protected $table = 'lemburs';
    
    protected $fillable = [
        'karyawan_id',
        'tanggal_lembur',
        'jumlah_lembur',   
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id');
    }

    public function lembur()
    {
        return $this->hasMany(Lembur::class, 'penggajian_id');
    }
}
