<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = [
        'nama',
    ];

    public function mataKuliahs()
    {
        return $this->hasMany(MataKuliah::class);
    }

    public function edoms()
    {
        return $this->belongsToMany(Edom::class);
    }
}
