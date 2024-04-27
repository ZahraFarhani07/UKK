<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;

class Penggajian extends Model
{
    use HasFactory;

    protected $table = 'penggajians';

    protected $fillable = [
        'tanggal',
        'keterangan',
        'karyawan_id',
        'jumlah_gaji',
        'jumlah_lembur',
        'jumlah_cuti',
        'total_gaji',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            // Your logic for updating

            // Check if the user can update the model
            return \Auth::user() && \Auth::user()->can('update', $model);
        });
    }
}
