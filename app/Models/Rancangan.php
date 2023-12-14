<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rancangan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_mahasiswa', 'id_jadwal'
    ];

    protected $hidden = [
        
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class,'id_jadwal','id');
    }
}
