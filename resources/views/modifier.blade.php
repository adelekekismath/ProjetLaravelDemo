<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="{{asset("css/materialize.css") }}">
        <link rel="stylesheet" href="{{ asset("css/style.css") }}">
        <title>Composer</title>
    </head>
<body>

  <div class="container">
    <div id="modal1" >
        <div class="modal-content">
            <h1 class="center blue-text"> Inscription</h1>
        <div class="row ">
        <form action="{{route("traitementModification")}}"  method="POST" class="col s12">
               {!! csrf_field() !!}

              <div class="row">
                <div class="input-field col s6">

                    <select value={{ $id_mat }} name="matiere">

                        @foreach ($matiere as $mat)
                        @if ( $id_mat == $mat->code_mat)
                        <option  selected value={{ $mat->code_mat }} >{{ $mat->lib_mat }}</option>

                        @endif
                        @endforeach

                    </select>
                </div>

                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <input name="note" type="number" value={{ $note}} class="validate">
                    <label >Votre note</label>
                  </div>
                </div>

                <button class="btn waves-effect blue" type="submit" >Modifier
                    <i class="material-icons right">send</i>
                  </button>

            </form>


      </div>
  </div>
</div>
</div>


</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
 $(document).ready(function(){
    $('select').formSelect();
  });</script>
  <script src="{{ asset("jquery.min.js") }}"></script>
  <script src="{{ asset("js/materialize.js") }}"></script>
  <script src="{{ asset("js/init.js") }}"></script>
</html>
