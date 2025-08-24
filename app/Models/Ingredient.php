<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ingredients';
    protected $primaryKey = 'ingredient_id';
    public $timestamps = true;

    protected $fillable = [
        'ingredient_name'
    ];

    public function plateIngredients()
    {
        return $this->hasMany(PlateIngredient::class, 'ingredient_id');
    }

    public function ingredientCompetitions()
    {
        return $this->hasMany(IngredientCompetition::class, 'ingredient_id');
    }

    public function removedIngredients()
    {
        return $this->hasMany(RemovedIngredient::class, 'ingredient_id');
    }
}
