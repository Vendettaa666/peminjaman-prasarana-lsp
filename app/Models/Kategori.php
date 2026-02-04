<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];

    public function inputAspirasis() {
        return $this->hasMany(InputAspirasi::class, 'kategori_id');
    }
}
