<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class member_booking_private extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'booking_id',
        'member_id',
        'member_name',
        'member_email',
        'place_name',
        'number_of_travel',
        'date_start',
        'date_end',
        'member_detail',
        'member_contact',
        'booking_status',
        ];
}
