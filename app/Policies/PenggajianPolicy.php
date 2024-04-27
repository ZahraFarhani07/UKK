<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Penggajian;

class PenggajianPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    // public function update(User $user, Penggajian $penggajian)
    // {
    //     // Berikan izin untuk update jika pengguna memiliki peran 'admin' atau 'accounting'
    //     return $user->hasRole(['admin', 'accounting']);
    // }

}
