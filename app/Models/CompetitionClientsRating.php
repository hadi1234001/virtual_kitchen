<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionClientsRating extends Model
{
    use HasFactory;

    protected $table = 'competition_clients_rating';
    protected $primaryKey = 'competition_clients_rating_id';

    protected $fillable = [
        'competition_chefs_id',
        'client_id',
        'rate',
        'comment',
    ];

    public function competitionChef()
    {
        return $this->belongsTo(CompetitionChef::class, 'competition_chefs_id', 'competition_chefs_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }
}
