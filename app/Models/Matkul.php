<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matkul extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kode', 'matkul', 'sks', 'smt', 'semester', 'id_prodi'
    ];

    protected $hidden = [
        
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'id_prodi','id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'id_matkul');
    }
}
