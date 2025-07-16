<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionDoc extends Model
{
    protected $table = "AdditionDocs";

    protected $fillable = [
        'tracking_code',
        'title',
        'data',
        'time',
        'officer'
    ];
}
