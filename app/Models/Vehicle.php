<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bbm_consumption',
        'service_time',
    ];

    public function UsageHistories()
    {
        return $this->hasMany(UsageHistory::class, 'vehicle_id');
    }

    public function Order()
    {
        return $this->hasMany(Order::class, 'vehicle_id');
    }
}
