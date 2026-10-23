<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shirt extends Model
{
    protected $fillable = ['name', 'price', 'description', 'star', 'image'];
}
