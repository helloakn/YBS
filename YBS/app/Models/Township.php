<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'Township';
    protected $fillable = [
        'name', 'lat', 'lag',
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