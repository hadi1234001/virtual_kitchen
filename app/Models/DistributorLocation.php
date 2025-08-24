<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributorLocation extends Model
{
    use HasFactory;

    protected $table = 'distributor_locations';
    protected $primaryKey = 'distributor_location_id';
    public $timestamps = true;

    protected $fillable = [
        'latitude',
        'longitude',
        'distributor_id'
    ];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'distributor_id');
    }
}
