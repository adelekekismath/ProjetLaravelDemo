<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="{{asset("css/materialize.css") }}">
        <link rel="stylesheet" href="{{ asset("css/style.css") }}">
        <title>Dashboard</title>
    </head>
<body>
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="{{route("Home")}}" class="brand-logo">GesEtu</a>
        <ul class="right hide-on-med-and-down">

            <li><a href="{{route("DashboardEtu")}}">Gestion des notes</a></li>
        </ul>
        <ul id="nav-mobile" class="sidenav">

            <li><a href="{{route("DashboardEtu")}}">Gestion des notes</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
  <div class="container">
    <h3 class="header center orange-text">Mon profil</h3>
    <div class="card large light-blue lighten-1">



        <div class="card-content ">

      <div class="col s12 m8 offset-m2 l6 offset-l3 ">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="{{ asset('image/'. $user->lien_photo ) }}" alt="" class="circle responsive-img">
            </div>
            <div class="col s10">
            <h4> <i class="medium material-icons left">person</i>{{$user->nom}} {{$user->prenom}}</h4>
            <div>
                <br/>
               <h5> <i class="material-icons left ">person_pin</i> {{$user->pseudo}}</h5>
            </div>
            <div>
                <h5> <i class="material-icons left">email</i> {{$user->email}}</h5>
             </div>
             <div>
                <h5> <i class="material-icons left">school</i> {{$user->lib_fil}}</h5>
             </div>
            <div><a href="{{route('modifierUser')}}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">edit</i></a></div>
            </div>
          </div>
        </div>
      </div>



      </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script >
    $(document).ready(function(){
    $('.modal').modal();

})</script>
  <script src="{{ asset("jquery.min.js") }}"></script>
  <script src="{{ asset("js/materialize.js") }}"></script>
  <script src="{{ asset("js/init.js") }}"></script>
</html>

