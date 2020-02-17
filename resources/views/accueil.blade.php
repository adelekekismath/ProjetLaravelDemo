<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{asset("css/materialize.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <title>Accueil</title>
</head>
<body>
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="{{route("Home")}}" class="brand-logo">GesEtu</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="{{route("SignUp")}}">Se connecter</a></li>
            <li><a href="{{route("SignIn")}}">S'incrire</a></li>
        </ul>
        <ul id="nav-mobile" class="sidenav">
            <li><a href="{{route("SignUp")}}">Se connecter</a></li>
            <li><a href="{{route("SignIn")}}">S'incrire</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
      <div class="section no-pad-bot" id="index-banner">
        <div class="container">
          <br><br>
          <h1 class="header center orange-text">Gestion des notes des etudiants</h1>
          <div class="row center">
            <h5 class="header col s12 light">Bienvenu sur la plateforme de gestion des notes des etudiants</h5>
          </div>
          <div class="row center">
            <a class="waves-effect waves-light btn modal-trigger orange" href="{{route("SignIn")}}" >Lancer vous</a>

        </div>
          <br><br>

        </div>
      </div>


      <div class="container">
        <div class="section">

          <!--   Icon Section   -->
          <div class="row">
            <div class="col s12 m4">
              <div class="icon-block">
                <h2 class="center light-blue-text"><i class="material-icons">person</i></h2>
                <h5 class="center">Option Connexion</h5>

                <p class="light">Tout part de votre connexion</p>
              </div>
            </div>

            <div class="col s12 m4">
              <div class="icon-block">
                <h2 class="center light-blue-text"><i class="material-icons">event_note</i></h2>
                <h5 class="center">Gestion des notes</h5>

                <p class="light">Une meilleur organisation des vos notes</p>
              </div>
            </div>

            <div class="col s12 m4">
              <div class="icon-block">
                <h2 class="center light-blue-text"><i class="material-icons">file_download</i></h2>
                <h5 class="center">Telecharger</h5>

                <p class="light">Telecharger la liste des vos notes</p>
              </div>
            </div>
          </div>

        </div>
        <br><br>
      </div>

      <footer class="page-footer orange">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Company Bio</h5>
              <p class="grey-text text-lighten-4">Ce site vous permet de gerer vos notes</p>


            </div>
            <div class="col l3 s12">
              <h5 class="white-text">Settings</h5>
              <ul>
                <li><a class="white-text" href="#!">Link 1</a></li>
                <li><a class="white-text" href="#!">Link 2</a></li>
              </ul>
            </div>
            <div class="col l3 s12">
              <h5 class="white-text">Connect</h5>
              <ul>
                <li><a class="white-text" href="#!">Link 1</a></li>
                <li><a class="white-text" href="#!">Link 2</a></li>
                <li><a class="white-text" href="#!">Link 3</a></li>
                <li><a class="white-text" href="#!">Link 4</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
          Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
          </div>
        </div>
      </footer>


      <!--  Scripts-->


</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script >
    $(document).ready(function(){
    $('.modal').modal();
  });

   </script>
<script src="{{ asset("jquery.min.js") }}"></script>
<script src="{{ asset("js/materialize.js") }}"></script>
<script src="{{ asset("js/init.js") }}"></script>
</html>
