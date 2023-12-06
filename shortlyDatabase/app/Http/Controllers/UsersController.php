<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function storeRegistration(Request $request)
    {
        $data = $request->all();

        $request->validate([
            "email" => array(
                "required",
                "unique:users",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
            ),
            'password' => array(
                "required",
                "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{8,}$/",
            ),
        ]);

        $save = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user = User::where('email',  $data['email'])->first();
        
        $token = $user->createToken("authToken")->accessToken;

        $url = "http://localhost:5173/login/" . $token;

        //Envoie de l'url generer par mail pour activation du compte
        Mail::send('authentificationEmail', ['url' => $url], function ($message) use ($data) {
            $config = config('mail');
            $message->subject("Registration verification !")
                ->from($config['from']['address'], "Shortly")
                ->to($data['email']);
        });

        if ($save) {
            return response()->json([
                'success' => "Veuillez consulter votre boite mail pour activer votre compte utilisateur !",
            ]);
        }

        return response()->json([
            "message" => "Veuillez remplir tous les champs !"
        ]);
    }



    ///////////////////////////--FONCTION D'AUTHENTIFICATION--///////////////////////////////
    public function authentification(Request $request)
    {
        $user = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'email_verified' => true,
        ], $request->input('remember'));

        if ($user) {
            return redirect()->route('customersPage');
        }

        return redirect()->back()->with('error', 'E-mail ou mot de passe incorrect');
    }

    /////////////--RECUPERATION DES DONNER DE L'UTILISATEUR ET GENERATION DE LIEN--///////////
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
                now()->addMinutes(60),
                ['email' => $data['email']]
            );

            Mail::send('passwordResetEmail', ['url' => $url, 'name' => $user['lastName'] . '' . $user['firstName']], function ($message) use ($user) {
                $config = config('mail');
                $name = $user['lastName'] . '' . $user['firstName'];
                $message->subject("Password Forgot !")
                    ->from($config['from']['address'], "GesCar")
                    ->to($user['email'], $name);
            });
        } else {
            return redirect()->back()->with('error', "Adresse e-mail non associé à un compte. Veuillez vérifier l'adresse saisie.");
        }

        return redirect()->back()->with('success', "Veuillez consulter votre boite mail pour changer votre mot de passe !");
    }

    /////////////////////--VERIFICATION DU LIEN GENERER--/////////////////////////
    public function verifyPwd(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(404);
        }
        $email = $request->email;

        return view("usersPage.passwordResetPage", compact("email"));
    }

    /////////////////////--CHANGEMENT DE MOT DE PASSE--/////////////////////////
    public function updatePwd(Request $request, $email)
    {
        $validation = $request->validate([
            'password' => array(
                "required",
                "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{8,}$/",
                "confirmed:password_confirmation"
            ),
        ]);

        $Filter = User::where('email', $email);

        $Filter->update([
            "password" => Hash::make($validation['password']),
        ]);
        return redirect()->back()->with("success", "Mot de passe modifié  avec succès.");
    }

    /////////////////////--FONCTION DE DECONNEXION--/////////////////////////
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
