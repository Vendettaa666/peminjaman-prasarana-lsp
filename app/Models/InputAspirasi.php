<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InputAspirasi extends Model
{
    protected $fillable = [
    'user_id',
    'keterangan',
    'kategori_id',
    'lokasi'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function aspirasi() {
        return $this->hasOne(Aspirasi::class, 'input_aspirasi_id');
    }
}
