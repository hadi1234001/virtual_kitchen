<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sub_types';
    protected $primaryKey = 'sub_type_id';
    public $timestamps = true;

    protected $fillable = [
        'sub_type_name',
        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function plates()
    {
        return $this->hasMany(Plate::class, 'sub_type_id');
    }
}
