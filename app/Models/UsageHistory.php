<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsageHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'order_id',
        'start_date',
        'end_date'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
