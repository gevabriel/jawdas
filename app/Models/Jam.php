<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jam extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'jam',
    ];

    protected $hidden = [
        
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'id_jam');
    }
}
