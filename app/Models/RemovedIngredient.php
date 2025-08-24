<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemovedIngredient extends Model
{
    use HasFactory;

    protected $table = 'removed_ingredients';
    protected $primaryKey = 'removed_ingredient_id';
    public $timestamps = true;

    protected $fillable = [
        'order_plate_id',
        'ingredient_id'
    ];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id');
    }

    public function orderPlate()
    {
        return $this->belongsTo(OrderPlate::class, 'order_plate_id');
    }
}
