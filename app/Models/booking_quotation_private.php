<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class booking_quotation_private extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'booking_id',
        'quotation_id',
        'package_name',        
        'total_price',
        'price_deposit',
        'package_file',
        'quotation_detail',
        'quotation_status',
    ];
}
