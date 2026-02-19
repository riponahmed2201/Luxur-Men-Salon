<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Billing;
use App\Models\Service;

class BillingItem extends Model
{
    use HasFactory;

    protected $fillable = ['billing_id', 'service_id', 'price'];

    public function billing()
    {
        return $this->belongsTo(Billing::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
