<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clients';
    protected $primaryKey = 'client_id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'mobile_number',
        'location',
        'email',
        'password',
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

    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id');
    }

    public function competitionClientsRating()
    {
        return $this->hasMany(CompetitionClientsRating::class, 'chef_id');
    }
}
