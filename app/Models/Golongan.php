<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;

class Golongan extends Model
{
    use HasFactory;

    protected $table = 'golongans';
    
    protected $fillable = [
        'nama_golongan',
        'gaji_pokok',
        'tunjangan_istri',
        'tunjangan_anak',
        'tunjangan_transport',
        'tunjangan_makan',
        'karyawan_id',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}
