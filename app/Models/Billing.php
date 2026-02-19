<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_number',
        'customer_name',
        'customer_mobile',
        'total_amount',
        'discount_amount',
        'net_amount'
    ];

    public function items()
    {
        return $this->hasMany(BillingItem::class);
    }
}
