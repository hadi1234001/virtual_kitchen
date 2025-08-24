<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // <-- مهم
use Tymon\JWTAuth\Contracts\JWTSubject;                // <-- مهم
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable implements JWTSubject
{
    use HasFactory, SoftDeletes;

    protected $table = 'admins';
    protected $primaryKey = 'admin_id';
    public $timestamps = true;
    protected $fillable = [
        'user_name',
        'password',
    ];

    // العلاقة مع Competitions
    public function competitions()
    {
        return $this->hasMany(Competition::class, 'admin_id');
    }

    // ===== JWT =====
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
