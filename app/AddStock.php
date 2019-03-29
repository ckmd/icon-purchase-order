<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddStock extends Model
{
    protected $fillable = [
        'nama_sbu', 'id_item','add_stock'
    ];
}
