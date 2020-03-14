<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/materialize.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <title>connexion</title>
</head>
<body>

    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="{{route("Home")}}" class="brand-logo">GesEtu</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="{{route("SignIn")}}">S'incrire</a></li>

          </ul>
          <ul id="nav-mobile" class="sidenav">
            <li><a href="{{route("SignIn")}}">S'incrire</a></li>

          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
      </nav>

     <div class="container">
         <h1 class="blue-text"> Connexion</h1>
         <div class="row">
         <form action="{{route("traitementC")}}" method="post">

            {!! csrf_field() !!}
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" name="pseudo" id="" class="validate">
                    <label for="">Pseudo</label>
                </div>
            </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" name="passwd" id="" class="validate">
                        <label for="">Mot de passe</label>
                    </div>
                </div>

                    <div class="input-field col s6">

                 @if ($BadUser == "1" )
                     <p class="card-panel red lighten-1">Pseudo ou mot de passe incorrect!!!</p>
                 @endif
                 
                </div>
            </div>
            <button class="btn waves-effect blue" type="submit" >Envoyer
                <i class="material-icons right">send</i>
              </button>
              <small style="color:darkseagreen">
                  Vous n'avez pas encore de compte?
                  <a href="{{route("SignIn")}}" > Inscrivez vous</a>
              </small>

             </form>
         </div>

         @if ($errors->any())
            @foreach ($errors->all() as $erreur )
            <li class="card-panel red lighten-1">{{ $erreur }}</li>
            @endforeach

         @endif
     </div>
     <p><p><p><p></p></p></p></p>
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
</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script >
    $(document).ready(function(){
    $('.modal').modal();
  });

  $(document).ready(function(){
    $('select').formSelect();
  });

   </script>
<script src="{{ asset("jquery.min.js") }}"></script>
<script src="{{ asset("js/materialize.js") }}"></script>
<script src="{{ asset("js/init.js") }}"></script>

</html>
