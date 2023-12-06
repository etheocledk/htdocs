<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Commentaire;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $post = $data["posts"];
        $save = Blog::create([
            "posts" => $post
        ]);
        if ($save) {
            return response()->json([
                "message" => "post sauvegardé avec succes",
                "post" => $save
            ]);
        }
        return response()->json([
            "message" => "post non sauvegardé"
        ]);
    }

    public function liste()
    {
        $posts = Blog::all();
        return response()->json($posts);
    }

    public function saveComment(Request $request)
    {
        $data = $request->all();
        try {
            if (!Blog::where('id', $data['blog_id'])->exists()) {
                return response()->json(['message' => 'Blog ID not found !'], 200);
            }
            $save = Commentaire::create([
                "comment" => $data["text"],
                "blog_id" => $data["blog_id"]
            ]);
            if ($save) {
                return response()->json(["mesage" => "Comment added with successful !"], 201);
            }
        } catch (\Exception $exception) {
            return response()->json(["message" => $exception->getMessage()], 500);
        }
    }

    public function getCommentByBlog(Request $request, $id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json(['message' => 'Blog not found']);
        }
        /* $comments = $blog->comments; */
        return response()->json([
            /* "blog" => $blog, */
            "blog" => array("id"=>$blog->id, 
            "text"=>$blog->posts,
            "today"=>Carbon::now(),
            "today_format_yy-mm-dd"=>Carbon::now()->toDateString(),
            "today_format_string"=>Carbon::now()->toFormattedDateString(),
            "date_Created"=>Carbon::parse($blog->created_at)->locale('fr_FR')->diffForHumans(),
        ),
            "comments" => $blog->comments
        ]);
    }

    public function getBlogs(){
        $blogs=Blog::with(['comments'])->get();
        return response()->json($blogs);
    }

    public function deleteBlog($id){
        try{
            Blog::where('id',$id)->delete();
            return response()->json(['message'=>"blog deleted"]);
        } catch (\Exception $exception) {
            return response()->json(["message" => $exception->getMessage()], 500);
        }
    }
}
