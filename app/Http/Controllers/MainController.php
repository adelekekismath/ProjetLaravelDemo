<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationFormulaire;
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

    public function traitement(ValidationFormulaire $request){
       echo"bvcfdx";
        $validate=  $request->validated();
        if ( $validate->fails()) {
            Session::flash('error', $validate->messages()->first());
            return redirect()->back()->withInput();
        }
    }
    public function traitemenC(){

    }
}
