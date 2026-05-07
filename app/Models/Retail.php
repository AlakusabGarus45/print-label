<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retail extends Model
{
    protected $table = 'retails';
    protected $fillable = ['name', 'address', 'contact'];
}
