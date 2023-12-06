<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {

        return view("login");
    }


    public function register()
    {
        return view("register");
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //validation du formulaire
        $request->validate([
            'nom' => "required|min:2",
            'prenom' => "required|min:2",
            "email" => array(
                "required",
                " unique:users",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
            ),
            'password' => array(
                "required",
                "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{8,}$/",
                "confirmed:password_confirmation"
            ),
        ]);
        //(en phph pou hasher md5

        //sauvegarde temporaire
        $save = User::create([
            'firsname' => $data['nom'],
            'lastname' => $data['prenom'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            "birthday" => $data['naissance']
        ]);

        //creation de l'url d'activation
        $url = URL::temporarySignedRoute(
            'verifyEmail',
            now()->addMinutes(30),
            ['email' => $data['email']]
        );

        //Envoie de l'utl generer par mail pour activation du compte
        //send(view, params, callback)


        Mail::send('mail', ['url' => $url, 'name' => $data['nom'] . '' . $data['prenom']], function ($message) use ($data) {
            $config = config('mail');
            $name = $data['nom'] . '' . $data['prenom'];
            $message->subject("Registration verification !")
                ->from($config['from']['address'], "ecole")
                ->to($data['email'], $name);
        });

        return redirect()->back()->with('success', "Veuilez consulter votre boite mail pour activer votre compte utilisateur");
    }

    public function verify(Request $request, $email)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            abort(404);
        }
        if (!$request->hasValidSignature()) {
            abort(404);
        }

        $user->update([
            "verify_at" => now(),
            "email_verified" => true
        ]);
        return redirect()->route("login")->with('success', "Compte activé avec succès");
    }

    public function listUser(){
        $user = User::active(true)->get();
    }




    public function forget()
    {
        return view("forget");
    }

    public function storePassword(Request $request)
    {
        $data = $request->all();
        $request->validate([
            "email" => array(
                "required",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
            ),
        ]);

        $user = User::where('email', $data["email"])->first();


        if (User::where('email', $data["email"])->exists()) {
            $id = $user['id'];
            $url = URL::temporarySignedRoute(
                'verifyPwd',
                now()->addMinutes(30),
                ['email' => $data['email'], 'id' => $id]
            );


            Mail::send('forgotMail', ['url' => $url, 'name' => $user['frirsname'] . '' . $user['lastname']], function ($message) use ($user) {
                $config = config('mail');
                $name = $user['firsname'] . '' . $user['lastname'];
                $message->subject("Password Forgot !")
                    ->from($config['from']['address'], "ecole")
                    ->to($user['email'], $name);
            });
        } else {
            return redirect()->back()->with('error', "le mail n'existe pas");
        }

        return redirect()->back()->with('success', "Mail envoyé avec succès");
    }


    /*  public function change($id)
    {
        return view("change", compact("id"));
    } */


    public function verifyPwd(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(404);
        }
        $id = $request->id;
        /* return redirect()->route("change", array("id" => $request->id)); */
        return view("change", compact("id"));
    }


    public function updatePwd(Request $request, $id)
    {

        $validation = $request->validate([
            'password' => array(
                "required",
                "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{8,}$/",
                "confirmed:password_confirmation"
            ),
        ]);

        $Filter = User::find($id);

        $Filter->update([
            "password" => Hash::make($validation['password']),
        ]);
        return redirect()->back()->with("success", "mot de passe modifié  avec succès !");
    }

    public function authentification(Request $request)
    {

        $user = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'email_verified' => true
        ]);

        if ($user) {
            return redirect()->route('index');
        }

        return redirect()->back()->with('error', 'Combinainson email/pasword invalide ?');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
