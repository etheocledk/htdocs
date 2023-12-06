<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ["title", "content", "picture","user_id"];
    protected $table= "blog";

    public function user(){
        return $this->belongsTo(User::class,'user_id','id')->withDefault([
            "firsname"=>"jenkins",
            'lastname'=>'Zoe',
        ]);
    }

    
}
