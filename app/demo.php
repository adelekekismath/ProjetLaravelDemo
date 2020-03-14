<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class demo extends Model
{
   protected $fillable = ["nom","prenom","age","estGros"];
}
