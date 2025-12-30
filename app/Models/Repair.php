<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    /** @use HasFactory<\Database\Factories\RepairFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'user_id',
        'status',
        'total',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    // Repair belongs to a staff user
    public function staff()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Repair has many services
    public function services()
    {
        return $this->belongsToMany(Service::class, 'repair_services')
                    ->withPivot('price', 'quantity', 'subtotal')
                    ->withTimestamps();
    }
}
