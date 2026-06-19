<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = [
        'prodi_id',
        'nama',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function edoms()
    {
        return $this->belongsToMany(Edom::class);
    }
}
