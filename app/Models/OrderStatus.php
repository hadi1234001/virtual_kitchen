<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order_statuses';
    protected $primaryKey = 'status_id';
    public $timestamps = true;

    protected $fillable = ['status_name'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'status_id');
    }
}
