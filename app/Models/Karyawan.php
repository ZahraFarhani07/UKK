<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penggajian;
use App\Models\Cuti;
use App\Models\Lembur;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';
    
    protected $fillable = [
        'nik',
        'nama',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telp',
        'agama',
        'status_nikah',
        'alamat',
        'foto',
    ];

    public function golongan()
    {
        return $this->hasOne(Golongan::class, 'karyawan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lembur()
    {
        return $this->hasMany(Lembur::class, 'karyawan_id', 'id');
    }

    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'karyawan_id', 'id');
    }

    public function penggajian()
    {
        return $this->hasOne(Penggajian::class, 'karyawan_id', 'id');
    }
}
