<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus_Stop extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'Bus_Stop';
    protected $fillable = [
        'name', 'lat','lag','township_id'
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