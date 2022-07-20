<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['discount_header', 'iob', 'nto', 'nb', 'pi', 'rib', 'ip', 'name', 'address', 'date', 'discount_reference', 'discount_on', 'totalAmount', 'filler', 'payment_id'];

    /**
     * Getters
     */
    public function getTotalAmountAttribute($totalAmount)
    {
        return number_format($totalAmount, 0, '', ' ');
    }

    public function getDateAttribute($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::parse($created_at)->format('d-m-Y H:i');
    }

    /**
     * Relationships
     */
    public function receivers()
    {
        return $this->hasMany(Receiver::class);
    }
}