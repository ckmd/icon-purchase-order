<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddStockDetail extends Model
{
    protected $fillable = [
        'id_item','as_number','add_stock'
    ];

}
