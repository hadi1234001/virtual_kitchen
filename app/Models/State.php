<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';
    protected $primaryKey = 'state_id';
    public $timestamps = true;

    protected $fillable = [
        'state_name',
    ];

    // العلاقات
    public function chefs()
    {
        return $this->hasMany(Chef::class, 'state_id');
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'state_id');
    }
}
