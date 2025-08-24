<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlateIngredient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'plate_ingredients';
    protected $primaryKey = 'plate_ingredient_id';
    public $timestamps = true;

    protected $fillable = [
        'plate_id',
        'ingredient_id'
    ];

    public function plate()
    {
        return $this->belongsTo(Plate::class, 'plate_id');
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id');
    }
}
