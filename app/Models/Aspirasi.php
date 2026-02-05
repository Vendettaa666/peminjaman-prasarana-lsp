<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $fillable = [
        'input_aspirasi_id',
        'status',
        'feedback',
    ];

    public function inputAspirasi() {
        return $this->belongsTo(InputAspirasi::class, 'input_aspirasi_id');
    }
}
