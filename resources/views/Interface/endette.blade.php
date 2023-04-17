<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes des Clients endette</title>

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    @extends("layout.dashboard")

    @section("contenu")
    <div class="container">
        <h2 class="h3 mb-0 text-gray-800">Listes des clients Endettés:</h2><br>
        <table class="table table-hover" id="ma-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nom client</th>
              <th>Prenom</th>
              <th>Adresse</th>
              <th>Telephone</th>
              <th>N° Log Acheté</th>
              <th>Date achat</th>
              <th>Reste</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($endette as $cli)
            <tr>
              <td>{{$cli->id_cli}}</td>
              <td>{{$cli->nom_cli}}</td>
              <td>{{$cli->prenom_cli}}</td>
              <td>{{$cli->adresse_cli}}</td>
              <td>{{$cli->tel_cli}}</td>
              <td>{{$cli->num_log}}</td>
              <td>{{$cli->date_vente}}</td>
              <td>{{$cli->reste}}Ar</td>
            </tr>
            @endforeach
          </tbody>
        </table>
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
