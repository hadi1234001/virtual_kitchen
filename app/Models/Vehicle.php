<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    protected $primaryKey = 'vehicle_id';
    public $timestamps = true;

    protected $fillable = [
        'vehicle_name'
    ];

    // العلاقات
    public function distributors()
    {
        return $this->hasMany(Distributor::class, 'vehicle_id');
    }
}
