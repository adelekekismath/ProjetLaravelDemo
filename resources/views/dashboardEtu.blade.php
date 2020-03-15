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

            <li><a href="{{route("profil")}}">Mon profil</a></li>
        </ul>
        <ul id="nav-mobile" class="sidenav">

            <li><a href="{{route("profil")}}">Mon profil</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
  <div class="container">
    <h3 class=" ">Gestion de vos notes</h1>
        <a class="waves-effect orange btn"  href="{{route('composer')}}">Ajouter une note<i class="material-icons right">add</i></a>

    <table class="highlight">
        <thead>
          <tr>
              <th>Matiere</th>
              <th>Note</th>
              <th>Actions</th>
          </tr>
        </thead>

        <tbody>
            @if ($notes!= null)
            @foreach ($notes as $note)
            <tr>
                <td>{{$note->lib_mat}}</td>
                <td>{{$note->note}}</td>
                <td>
                <a href="{{route('Modifier',['id_mat' => $note->code_mat, 'note' => $note->note])}}"class="btn waves-effect green" type="submit" name="action">Modifier
                    <i class="material-icons right">edit</i></a>

                    <a href="{{ route('traitementSuppression', $note->code_mat) }}"class="btn waves-effect red" type="submit" name="action">Supprimer
                    <i class="material-icons right">delete</i></a>
                  </td>
              </tr>
            @endforeach

          @endif

        </tbody>
      </table>



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
