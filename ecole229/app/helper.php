<?php 
use App\Models\Blog;
if(!function_exists("idsDB")){
    function idsDB(){
        $id = Blog::pluck('id');
        return $id;
    }
}
