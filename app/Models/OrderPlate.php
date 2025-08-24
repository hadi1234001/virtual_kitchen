<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPlate extends Model
{
    /** @use HasFactory<\Database\Factories\OrderPlateFactory> */
    use HasFactory;
    protected $fillable = [
        'price_id',
        'order_id',
        'plate_id',
        'rate'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function plate()
    {
        return $this->belongsTo(Plate::class);
    }
    public function price()
    {
        return $this->belongsTo(Price::class);
    }
    public function removedIngredients()
    {
        return $this->hasMany(RemovedIngredient::class);
    }
}
