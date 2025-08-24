<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompetitionChef extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'competition_chefs_id';

    protected $fillable = [
        'competition_id',
        'chef_id'
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class, 'competition_id');
    }

    public function chef()
    {
        return $this->belongsTo(Chef::class, 'chef_id');
    }
    public function competitionClientsRating()
    {
        return $this->hasMany(CompetitionClientsRating::class, 'chef_id');
    }
}
