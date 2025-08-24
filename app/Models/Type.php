<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'types';
    protected $primaryKey = 'type_id';
    public $timestamps = true;

    protected $fillable = [
        'type_name',
    ];

    public function subTypes()
    {
        return $this->hasMany(SubType::class, 'type_id');
    }
}
