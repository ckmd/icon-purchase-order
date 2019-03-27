<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'po_number', 'po_date', 'nama_sbu', 'no_reservasi', 'project_name',
    ];
}
