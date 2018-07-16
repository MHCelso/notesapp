<?php

namespace Notes;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    // variable usada para actualizar campos del modelo.
    protected $fillable = ['user_id','note'];
}
