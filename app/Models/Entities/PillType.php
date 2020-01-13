<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class PillType extends Model
{
     protected $fillable = ['pill_name', 'pill_recipe', 'pill_price'];
     public $timestamps = false;
}
