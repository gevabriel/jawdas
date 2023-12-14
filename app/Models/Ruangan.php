<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruangan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_gedung', 'ruangan'
    ];

    protected $hidden = [
        
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'id_ruangan');
    }
}
