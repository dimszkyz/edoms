<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EdomResponse extends Model
{
    protected $fillable = [
        'edom_id',
        'nama_edom_snapshot',
        'prodi_snapshot',
        'mata_kuliah_snapshot',
        'nama_responden',
        'nim',
        'submitted_at',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
    ];

    public function edom()
    {
        return $this->belongsTo(Edom::class);
    }

    public function answers()
    {
        return $this->hasMany(EdomAnswer::class);
    }
}
