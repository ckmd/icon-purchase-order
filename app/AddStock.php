<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddStock extends Model
{
    protected $fillable = [
        'nama_sbu','as_number','description','as_date'
    ];
}
