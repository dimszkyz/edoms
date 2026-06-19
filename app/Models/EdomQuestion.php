<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EdomQuestion extends Model
{
    protected $fillable = [
        'category_id',
        'pernyataan',
        'tipe_soal',
    ];

    public function category()
    {
        return $this->belongsTo(EdomCategory::class);
    }
}