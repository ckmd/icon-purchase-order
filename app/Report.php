<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'nama_sbu',
        'id_item', 
        'jatah_awal', 
        'jatah_sisa',
        'jan',
        'feb',
        'mar',
        'apr',
        'mei',
        'jun',
        'jul',
        'agt',
        'sep',
        'okt',
        'nov',
        'des',
    ];
}
