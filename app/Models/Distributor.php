<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distributor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'distributors';
    protected $primaryKey = 'distributor_id';
    public $timestamps = true;

    protected $fillable = [
        'user_name',
        'first_name',
        'second_name',
        'last_name',
        'birth_date',
        'phone_number',
        'email',
        'password',
        'chef_id',
        'vehicle_id'
    ];

    public function chef()
    {
        return $this->belongsTo(Chef::class, 'chef_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function locations()
    {
        return $this->hasMany(DistributorLocation::class, 'distributor_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'distributor_id');
    }
}
