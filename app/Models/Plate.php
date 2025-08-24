<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plate extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'plates';
    protected $primaryKey = 'plate_id';
    public $timestamps = true;

    protected $fillable = [
        'plate_name',
        'description',
        'photo_path',
        'is_archived',
        'sub_type_id',
        'chef_id'
    ];

    public function chef()
    {
        return $this->belongsTo(Chef::class, 'chef_id');
    }

    public function subType()
    {
        return $this->belongsTo(SubType::class, 'sub_type_id');
    }

    public function prices()
    {
        return $this->hasMany(Price::class, 'plate_id');
    }

    public function plateIngredients()
    {
        return $this->hasMany(PlateIngredient::class, 'plate_id');
    }

    public function orderPlates()
    {
        return $this->hasMany(OrderPlate::class, 'plate_id');
    }
}
