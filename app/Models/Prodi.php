<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = [
        'unw_prodi_id',
        'nama',
        'slug',
        'page_slug',
        'jenjang',
        'jenjang_nama_singkat',
        'fakultas_unw_id',
        'fakultas_nama',
        'fakultas_page_slug',
        'api_updated_at',
        'synced_at',
    ];

    protected $casts = [
        'api_updated_at' => 'datetime',
        'synced_at' => 'datetime',
    ];

    public function getDisplayNameAttribute(): string
    {
        return trim(($this->jenjang_nama_singkat ? $this->jenjang_nama_singkat . ' - ' : '') . $this->nama);
    }

    public function mataKuliahs()
    {
        return $this->hasMany(MataKuliah::class);
    }

    public function edoms()
    {
        return $this->belongsToMany(Edom::class);
    }
}
