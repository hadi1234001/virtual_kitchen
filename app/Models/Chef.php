<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chef extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'chefs';
    protected $primaryKey = 'chef_id';
    public $timestamps = true;

    protected $fillable = [
        'user_name',
        'first_name',
        'second_name',
        'last_name',
        'image_path',
        'email',
        'password',
        'overview',
        'birth_date',
        'mobile_number',
        'cv_path',
        'latitude',
        'longitude',
        'is_frozen',
        'state_id'
    ];

    // العلاقات
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function plates()
    {
        return $this->hasMany(Plate::class, 'chef_id');
    }

    public function competitions()
    {
        return $this->belongsToMany(Competition::class, 'competition_chefs', 'chef_id', 'competition_id');
    }

    public function distributors()
    {
        return $this->hasMany(Distributor::class, 'chef_id');
    }
}
