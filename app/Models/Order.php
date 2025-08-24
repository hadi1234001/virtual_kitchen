<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps = true;

    protected $fillable = [
        'order_date',
        'order_time',
        'delivery_date',
        'delivery_time',
        'note',
        'comment',
        'rate',
        'client_id',
        'distributor_id',
        'status_id',
        'delivery_latitude',
        'delivery_longitude'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'distributor_id');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    public function orderPlates()
    {
        return $this->hasMany(OrderPlate::class, 'order_id');
    }

}
