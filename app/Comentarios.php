<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class EventoModel extends Model
{
    
    protected   $table          = 'Comments';
    public      $timestamps     = false;
    protected   $fillable       = array('idComments','user_id','Comentario','likesComentario');
    protected   $primaryKey = 'idComments';
    protected   $guarded        = ['idComments'];
    
}