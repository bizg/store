<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'id',
        'customer_name',
        'customer_email',
        'customer_mobile',
        'status',
        'customer_address',
        'reference',
        'product_id',
        'session',
    ];
}
