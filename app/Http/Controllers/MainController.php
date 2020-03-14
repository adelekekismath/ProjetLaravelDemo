<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\VerifiedUser;
use App\Http\Requests\ValidationFormulaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\demo;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SgnUpMail;


class MainController extends Controller

{
    private $GoodUser = "0";
    public function index(){
        return view('accueil');
    }

    public function inscription(){
        $data = DB::table('Fillieres')->get();
        return view('inscription',compact('data'));
    }

    public function connexion(){
        return view('connexion' , ['BadUser'=> $this->GoodUser]);
    }
    public function demo(){
       /* $user = demo::create([
            "nom"=>"Lucas",
            "prenom"=>"Lucas",
            "age"=>18,
            "estGros"=>true
        ]);*/
        $data = demo::all();
        return view('demo', compact('data'));
    }

    public function traitement(ValidationFormulaire $req){

       /*  $validate =  $req->validated();
        if ( $validate->fails()) {
            Session::flash('error', $validate->messages()->first());
            return redirect()->back()->withInput();
        }else { */
            $PseudoExist = DB::table('Etudiants')
               ->where( 'pseudo', $req->pseudo)->exists();
            $EmailExist = DB::table('Etudiants')
            ->where('email', $req->email)->exists();

              if ($EmailExist && $PseudoExist) {
                  return redirect()->back()->withErrors(["Cet email et Ce pseudo sont dejà pris"])->withInput();
              }elseif ($EmailExist) {
                return redirect()->back()->withErrors(["Cet email est dejà pris"])->withInput();
              }elseif ($PseudoExist) {
                return redirect()->back()->withErrors(["Cet email est dejà pris"])->withInput();
              }
               else {
                $etu = DB::table('Etudiants')->insert([
                    "pseudo"=> $req->pseudo,
                    "email"=> $req->email,
                    "password"=> $req->passwd,
                    "nom"=> $req->nom,
                    "prenom"=> $req->prenom,
                    "code_fil"=> $req->filiere,

                ]);
               if ($etu) {
                    Mail::to($req->email)->send(new SgnUpMail($req->nom,$req->prenom));
                    return view('accueil');
               }
              }


      //  }


    }
    public function traitementC(Request $request){

      // $validate = $request->validated();
          $validate = Validator::make($request->all(), [
           'pseudo'  => "required",
           'passwd'   => "required"
        ]);
        if ($validate->fails()) {

          Session::flash('error', $validate->messages()->first());
         return redirect()->back()->withErrors($validate)->withInput();
        } else {

            $user = DB::table('Etudiants')->where([
                ['pseudo', $request->pseudo],
                ['password', $request->passwd]
                ])->exists();

             if ($user) {
                return redirect()->route('DashboardEtu');
             }else {

               // return redirect()->route('SignUp',  ['BadUser'=> "1"]);
               $this->GoodUser = "1";
               return view('connexion' , ['BadUser'=> $this->GoodUser]);
             }
        }



    }

    public function DashboardEtu(){

        return view('dashboardEtu');
    }
}
