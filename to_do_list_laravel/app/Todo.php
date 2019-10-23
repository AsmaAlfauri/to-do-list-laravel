<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
   protected $fillable=['todo','user_id'];

   public function user(){ //any name descriptive name
       return$this->hasOne('App/User'); //name of model
   }
}
