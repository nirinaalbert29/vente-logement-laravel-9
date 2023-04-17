<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Logement Dispo</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

</head>
<body>
    @extends("layout.dashboard")

    @section("contenu")
    <div class="container">
        <h2 class="h3 mb-0 text-gray-800">Listes des Logements Disponible:</h2><br>
        @if (session()->has('success'))
        <script>
            Swal.fire(
            'Bon travaille!',
            'Ajout Logement Réussite!',
            'success'
            )
        </script>
        @endif
        @if (session()->has('successDelete'))
        <script>
            Swal.fire(
            'Good job!',
            'Suppression Logement Réussite!',
            'success'
            )
        </script>
        @endif
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
              <th>ACTIONS</th>
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
              <td>
                <a href="/logement-edit/{{ $log->id }}" class="btn btn-sm btn-primary">Modifier</a>
                <button onclick="supprimer({{$log->id}})" class="btn btn-sm btn-danger">Supprimer</button>
              </td>
              <script>
                function supprimer(id) {
                    Swal.fire({
                        title: 'Êtes-vous sûr de vouloir supprimer?',
                        text: "Vous ne pourrez pas revenir en arrière!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oui, supprimez-le!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/logement-delete/' + id;
                        }
                    })
                }
            </script>
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
