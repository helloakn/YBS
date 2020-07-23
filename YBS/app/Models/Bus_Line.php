<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus_Line extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'Bus_Line';
    protected $fillable = [
        'bus_line_number', 'bus_line_color'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at'
    ];
}