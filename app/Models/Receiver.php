<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    use HasFactory;

    protected $fillable = ['ontto', 'ontto2', 'rib', 'ip', 'name', 'address', 'amount', 'label', 'filler', 'payment_id'];

    public function getAmountAttribute($amount)
    {
        return number_format($amount, 0, '', ' ');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}