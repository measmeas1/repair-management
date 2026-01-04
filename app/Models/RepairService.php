<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairService extends Model
{
    /** @use HasFactory<\Database\Factories\RepairServiceFactory> */
    use HasFactory;

    protected $fillable = [
        'repair_id',
        'service_id',
        'price',
        'quantity',
        'subtotal',
    ];

    public function repair()
    {
        return $this->belongsTo(Repair::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
