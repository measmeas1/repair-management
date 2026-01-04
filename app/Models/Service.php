<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    protected $fillable = [
        'service_name',
        'price',
        'duration',
        'status',
        'category',
    ];

    public function repairServices()
    {
        return $this->hasMany(RepairService::class);
    }

    public function repairs()
    {
        return $this->belongsToMany(Repair::class, 'repair_services')
                    ->withPivot('price', 'quantity', 'subtotal')
                    ->withTimestamps();
    }
}
