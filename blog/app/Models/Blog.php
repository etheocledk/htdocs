<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model{
    protected $fillable =['posts'];
    protected $table ='blog';

    public function comments(){
        return $this->hasMany(Commentaire::class, 'blog_id','id');
     }
}