<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EdomAnswer extends Model
{
    protected $fillable = [
        'edom_response_id',
        'edom_question_id',
        'nama_kategori_snapshot',
        'pernyataan_snapshot',
        'edom_option_id',
        'option_label_snapshot',
        'option_nilai_snapshot',
        'jawaban_teks',
        'nilai',
    ];

    public function response()
    {
        return $this->belongsTo(EdomResponse::class, 'edom_response_id');
    }

    public function question()
    {
        return $this->belongsTo(EdomQuestion::class, 'edom_question_id');
    }

    public function option()
    {
        return $this->belongsTo(EdomOption::class, 'edom_option_id');
    }
}
