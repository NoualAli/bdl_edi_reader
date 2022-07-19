<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issuer extends Model
{
    use HasFactory;

    protected $fillable = ['discount_header', 'iob', 'nto', 'nb', 'pi', 'rib', 'ip', 'name', 'address', 'date', 'discount_reference', 'discount_on', 'totalAmount', 'filler', 'payment_id'];

    public function getTotalAmountAttribute($totalAmount)
    {
        return number_format($totalAmount, 0, '', ' ');
    }
    public function getDateAttribute($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }
}