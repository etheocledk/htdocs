<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model{
    protected $fillable =['comment','blog_id'];
    protected $table ='commentaire';

    public function blog(){
       return $this->belongsTo(Blog::class, 'blog_id','id');
    }

   
}