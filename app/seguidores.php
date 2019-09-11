<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seguidores extends Model
{
    protected   $table          = 'seguidores';
    public      $timestamps     = false;
    protected   $fillable       = array('idSeguido','idSeguidor');
    protected   $guarded        = ['id'];
}
