<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];

    public function inputAspirasi() {
        return $this->hasMany(InputAspirasi::class, 'kategori_id');
    }
}
