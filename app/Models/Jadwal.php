<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_prodi', 'id_ta', 'id_kelas', 'id_matkul', 'id_dosen', 'id_hari', 'id_jam', 'id_ruangan'
    ];

    protected $hidden = [
        
    ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class,'id_matkul','id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class,'id_ruangan','id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'id_kelas','id');
    }

    public function rancangan()
    {
        return $this->hasMany(Rancangan::class,'id_jadwal');
    }

    public function hari()
    {
        return $this->belongsTo(Hari::class,'id_hari','id');
    }

    public function jam()
    {
        return $this->belongsTo(Jam::class,'id_jam','id');
    }
}
