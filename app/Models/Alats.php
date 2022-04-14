<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alats extends Model
{
    use HasFactory;

    protected $fillable = [
        'nm_alat', 'alamat', 'lat','lng','jarak_normal','jarak_warning','jarak_danger','gambar'
    ];

    public function status()
    {
        return $this->hasMany(Status::class);
    }
}
