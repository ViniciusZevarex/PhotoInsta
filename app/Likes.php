<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Likes extends Model
{

    protected   $table          = 'likes';
    public      $timestamps     = false;
    protected   $fillable       = array('idLikes','user_id','idPost');
    protected   $primaryKey = 'idLikes';
    protected   $guarded        = ['idLikes'];

}
