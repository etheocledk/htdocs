<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
       $user =Auth::user();
        $nom = $user ? $user->firsname:'';
        $prenom =$user ? $user->lastname:'';
        $blogs_list = $user->blogs()->paginate(2);//Blog::where('user_id', $user->id)->get();
        
        return view('blog', compact('nom', 'prenom', "blogs_list"));
    }

    public function show($id = null)
    {
        $nom = "MARUS";
        $prenom = "ASSOGBA";
        return view('blog', compact('nom', 'prenom', 'id'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        /* dd($data); */
        $validation = $request->validate([
            "content" => "required",
            "title" => "required",
            /* "picture" => "required|mimes:jpg,jpeg,png,gif", */
        ]);

        $file = $request->file("picture");
        /* $name = $file->getClientOriginalName(); */
        $image=null;
        //Possibility2
        if ($request->hasFile("picture")) {
            $image = $file->store('avatar');
            /* $size = $file->getSize(); */
            /* POur controler la taile de l'mage if($size>50000){
                return redirect()->route("index")-> with("message", "Attention la taille du fichier pose probleme");
            } */
        }

        //Possibilite 4
        /* $storage = Storage::disk("users");
        $s = $storage->put($name, file_get_contents($file));  */

        //Possibilite 5
        /* $storage = Storage::disk("users_public");
        $s = $storage->put($name, file_get_contents($file)); */


        //Possibility 1
        /* $storage = Storage::disk("users");
        $s = $storage->put($name, file_get_contents($file));  */



        //Possibility3 !! Ca c(est) du php simple
        /* $s=$file->move(storage_path('app'),'toto'); */
        $save = Blog::create([
            "title" => $data["title"],
            "content" => $data["content"],
            "picture" => 'kjdf',
            'user_id'=> Auth::user()->id
        ]);
        return response()->json(['message'=>"Blog sauvegardé avec succès !"]);
        //return redirect()->route("index")->with("message", "Blog sauvegardé avec succès !");
    }

    public function all(){
        $user =Auth::user();
        $nom = $user ? $user->firs_name:'';
        $prenom =$user ? $user->last_name:'';
        $blogs_list = Blog::paginate(3);
        return view('blog', compact('nom', 'prenom', "blogs_list"));
    }


    public function updateView($id){
        $blog = Blog::where('id',$id)->first();
        return view('updateView',compact('id'));
    }

    //gestion des pdf
    public function printBlog(){
        $blogs = Blog::all();
        $pdf =Pdf::loadView('print', ['blogs'=>$blogs]);
        //gestion de la taille des documents generer
        $pdf->setPaper('A4','landscape');
        //pour le paysage
        return $pdf->stream('Blog_list.pdf');
        /* return $pdf->download('Blog_list.pdf'); */
    }
}
