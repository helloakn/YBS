<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus_Line_Route extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'Bus_Line_Route';
    protected $fillable = [
        'type', 'bus_line_id','bus_stop_id','quee_no'
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