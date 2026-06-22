<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EdomCategory;
use App\Models\EdomQuestion;

class Edom extends Model
{
    protected $fillable = [
        'nama_edom',
        'tanggal_dibuat',
        'status',
    ];

    public function prodis()
    {
        return $this->belongsToMany(Prodi::class);
    }

    public function mataKuliahs()
    {
        return $this->belongsToMany(MataKuliah::class);
    }

    public function categories()
    {
        return $this->hasMany(EdomCategory::class);
    }

    public function questions()
    {
        return $this->hasManyThrough(
            EdomQuestion::class,
            EdomCategory::class,
            'edom_id',
            'category_id'
        );
    }

    public function isDraft(): bool
    {
        return $this->status === 'draft';
    }

    public function isActive(): bool
    {
        return $this->status === 'aktif';
    }

    public function isClosed(): bool
    {
        return $this->status === 'ditutup';
    }
    public function options()
    {
        return $this->hasMany(EdomOption::class);
    }
}
