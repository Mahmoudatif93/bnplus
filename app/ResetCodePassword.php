<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResetCodePassword extends Model
{
    protected $fillable = [
    'email',
    'code',
    'created_at',
];
}
