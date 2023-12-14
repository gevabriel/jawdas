<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hari extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'hari',
    ];

    protected $hidden = [
        
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class,'id_hari');
    }
}
