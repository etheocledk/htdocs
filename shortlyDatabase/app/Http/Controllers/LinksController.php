<?php

namespace App\Http\Controllers;

use App\Models\Links;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $oldLinks=$data['oldLinks'];
        $shortLinks=$data['shortLinks'];
        $user_id=$data['user_id'];
        $save = Links::create([
            "oldLinks" => $oldLinks,
            "shortLinks"=>$shortLinks,
            "user_id"=>$user_id
        ]);
        if ($save) {
            return response()->json([
                "message" => "post sauvegardé avec succes",
            ]);
        }
        return response()->json([
            "message" => "post non sauvegardé"
        ]);
    }
}
