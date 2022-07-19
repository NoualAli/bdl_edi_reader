<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::parse($created_at)->format('d-m-Y H:i');
    }

    public function issuer()
    {
        return $this->hasOne(Issuer::class);
    }

    public function receivers()
    {
        return $this->hasMany(Receiver::class);
    }
}