<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Competition extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'competition_id';

    protected $fillable = [
        'plate_name',
        'description',
        'competition_date',
        'start_time',
        'image_path',
        'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function competitionChefs()
    {
        return $this->hasMany(CompetitionChef::class, 'competition_id');
    }



    public function ingredientsCompetitions()
    {
        return $this->hasMany(IngredientCompetition::class, 'competition_id');
    }
}
