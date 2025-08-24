<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'prices';
    protected $primaryKey = 'price_id';
    public $timestamps = true;

    protected $fillable = [
        'person_number',
        'price',
        'discount',
        'plate_id'
    ];

    public function plate()
    {
        return $this->belongsTo(Plate::class, 'plate_id');
    }

    public function orderPlates()
    {
        return $this->hasMany(OrderPlate::class, 'price_id');
    }
}
