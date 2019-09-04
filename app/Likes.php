<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class EventoModel extends Model
{
    
    protected   $table          = 'Likes';
    public      $timestamps     = false;
    protected   $fillable       = array('idLikes','user_id','idPost','likes');
    protected   $primaryKey = 'idLikes';
    protected   $guarded        = ['idLikes'];
    
}