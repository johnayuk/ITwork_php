<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'des_from',
        'des_to',
        'depart',
        'returning',
        'adult',
        'children',
        'f_class'
    ];

//     public function user()
// {
//     return $this->belongsTo(User::class);
// }
}
