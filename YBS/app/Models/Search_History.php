<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Search_History extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'Search_History';
    protected $fillable = [
        'device_id', 'from_route','to_route'
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