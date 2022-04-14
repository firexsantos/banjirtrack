<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'alats_id', 'alerts_id'
    ];

    public function alats(){
        return $this->belongsTo(Alats::class);
    }

    public function alerts(){
        return $this->belongsTo(Alerts::class);
    }
}
