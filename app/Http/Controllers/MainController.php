<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('accueil');
    }

    public function inscription(){
        return view('inscription');
    }

    public function connexion(){
        return view('connexion');
    }

    public function traitement(Request $request){
        echo 'Votre Pseudo est '. $request->input('pseudo');
        echo 'Votre Mail est '. $request->input('email');
        echo 'Votre Nom est '. $request->input('nom');
        echo 'Votre Prenom est '. $request->input('prenom');
        echo 'Votre Password est '. $request->input('password');
        echo 'Votre Filiere est '. $request->input('filiere');
    }
    public function traitemenC(){

    }
}
