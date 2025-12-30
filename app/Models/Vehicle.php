<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'model',
        'plate_number',
        'year',
        'name',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }
}
