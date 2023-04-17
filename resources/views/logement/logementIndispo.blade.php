<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Logement Indispo</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @extends("layout.dashboard")

    @section("contenu")
    <div class="container">
        <h2 class="h3 mb-0 text-gray-800">Listes des Logements Déjà Vendu(Indisponible) :</h2><br>
        <table class="table table-hover" id="ma-table">
          <thead>
            <tr>
              <th>#</th>
              <th>N° LOGEMENT</th>
              <th>NBRE CHAMBRE</th>
              <th>SUPERFICIE</th>
              <th>CODE CITE</th>
              <th>PRIX</th>
              <th>STATUT</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Logement as $log)
            <tr>
              <td>{{$log->id}}</td>
              <td>{{$log->num_log}}</td>
              <td>{{$log->nb_chambre}}</td>
              <td>{{$log->superficie}}</td>
              <td>{{$log->lib_cite}}</td>
              <td>{{$log->prix_log}}Ar</td>
              <td>{{$log->statut}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{-- pagination de listes dans tableau--}}
        {{$Logement->links()}}
      </div>


      <script>
        // Sélectionnez le champ de saisie et le tableau
        var input = document.getElementById("myInput");
        var table = document.getElementById("ma-table");

        // Ajoutez un écouteur d'événement sur le champ de saisie
        input.addEventListener("keyup", function() {
        // Récupérez la valeur saisie par l'utilisateur
        var filter = input.value.toUpperCase();

        // Parcourez toutes les lignes du tableau, en excluant la première ligne (l'entête)
        for (var i = 1; i < table.rows.length; i++) {
            var row = table.rows[i];

            // Parcourez toutes les colonnes de chaque ligne
            for (var j = 0; j < row.cells.length; j++) {
            var cell = row.cells[j];

            // Si la cellule contient la valeur saisie, affichez la ligne, sinon masquez-la
            if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                row.style.display = "";
                break;
            } else {
                row.style.display = "none";
            }
            }
        }
        });

    </script>
      @endsection
</body>
</html>
