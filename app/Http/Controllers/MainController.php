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
        $file_name = null;
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
           $extension = $file->getClientOriginalExtension();
           $file_name = time().'.'.$extension;
           $destination = public_path('image');
           $file->move($destination, $file_name);
        }

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
                    "lien_photo"=>$file_name

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
                ])->value('num_mat');

             if ($user) {
                $request->session()->put('id_user', $user);
                $notes = DB::table('Composer')->join('Matieres', 'Composer.code_mat', '=', 'Matieres.code_mat')->get();
                return redirect('adminEtu')->with('notes', $notes);


             }else {

               // return redirect()->route('SignUp',  ['BadUser'=> "1"]);
               $this->GoodUser = "1";
               return view('connexion' , ['BadUser'=> $this->GoodUser]);
             }
        }




    }

    public function adminEtu(){
        return view('adminEtu');
    }
    public function DashboardEtu(){
        $notes = DB::table('Composer')->join('Matieres', 'Composer.code_mat', '=', 'Matieres.code_mat')->get();

    return view('dashboardEtu', compact('notes'));
}

    public function composer(){
        $matiere = DB::table('Matieres')->get();
        return view('composer',compact('matiere'));
    }

    public function traitementComposer(Request $request){
            $id = $request->session()->get('id_user');
            $verify = DB::table('Composer')->join('Matieres', 'Composer.code_mat', '=', 'Matieres.code_mat')->where([
                ['Composer.code_mat',  $request->matiere],
                ['num_mat', $id ],
            ])->exists();

            if (!$verify) {
                echo  $verify;
                $note = DB::table('Composer')->insert([
                    "num_mat"=> $id,
                    "code_mat"=> $request->matiere,
                    "note"=> $request->note
                ]);
                $notes = DB::table('Composer')->join('Matieres', 'Composer.code_mat', '=', 'Matieres.code_mat')->get();
                return redirect('DashboardEtu')->with('notes', $notes);

            }else {
                $validate = ['Cette note existe déja!! Veuillez plutot la modifier'];
                Session::flash('error', $validate);
                return redirect()->back()->withErrors($validate)->withInput();
               //$request->session()->flash('error', "Cette note existe déja");
               //return redirect()->back()->withErrors($validator)->withInput();
            }


    }
    public function traitementSuppression($id_mat, Request $request ){
        //echo $id;
        $id = $request->session()->get('id_user');
        $user = DB::table('Composer')->where([['code_mat', $id_mat], ['num_mat', $id]])->delete();
       if ($user) {
        $notes = DB::table('Composer')->join('Matieres', 'Composer.code_mat', '=', 'Matieres.code_mat')->get();
         return redirect('DashboardEtu')->with('notes', $notes);
       }
    }

    public function Modifier($id_mat, $note){
        $matiere = DB::table('Matieres')->get();
        return view('modifier', compact(['id_mat','note', 'matiere']));
    }
    public function traitementModification(Request $request){

        $id = $request->session()->get('id_user');
        $user = DB::table('Composer')->where([['code_mat', $request->matiere], ['num_mat', $id]])
        ->update(['note'=> $request->note]);
        echo $id;
        echo $request->matiere;
        echo $request->note;
        echo $user;
       if ($user) {

        $notes = DB::table('Composer')->join('Matieres', 'Composer.code_mat', '=', 'Matieres.code_mat')->get();
         return redirect('DashboardEtu')->with('notes', $notes);

       }
    }
    public function profil(Request $request){
        $id = $request->session()->get('id_user');
        $user = DB::table('Etudiants')->join('Fillieres', 'Etudiants.code_fil', '=', 'Fillieres.code_fil')->where('num_mat', $id)->first();
        return view('profil', compact('user'));
    }

    public function modifierUser(Request $request){


        $id = $request->session()->get('id_user');
        $data = DB::table('Fillieres')->get();
        $user = DB::table('Etudiants')->join('Fillieres', 'Etudiants.code_fil', '=', 'Fillieres.code_fil')->where('num_mat', $id)->first();


        return view('modifierUser', compact('user', 'data'));
    }
    public function traitementModifUser(Request $request){
        $file_name = null;
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
           $extension = $file->getClientOriginalExtension();
           $file_name = time().'.'.$extension;
           $destination = public_path('image');
           $file->move($destination, $file_name);
        }

        //dd($request);
        $id = $request->session()->get('id_user');
        $user = DB::table('Etudiants')->where('num_mat', $id)
        ->update([ "pseudo"=> $request->pseudo,
                    "email"=> $request->email,
                    "password"=> $request->passwd,
                    "nom"=> $request->nom,
                    "prenom"=> $request->prenom,
                    "code_fil"=> $request->filiere,
                    "lien_photo"=>$file_name]);

                   // echo $id;
       if ($user) {

            $user = DB::table('Etudiants')->join('Fillieres', 'Etudiants.code_fil', '=', 'Fillieres.code_fil')->where('num_mat', $id)->first();
            return redirect('profil')->with('user', $user);
            

       }

    }
}
