<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Cités</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('recherche.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

</head>
<body>
    @extends("layout.dashboard")

    @section("contenu")
    <div class="container">
        <h2 class="h3 mb-0 text-gray-800">Listes des cités :</h2><br>
        @if (session()->has('success'))
            <script>
                Swal.fire(
                'Good job!',
                'Ajout Cité Réussite !',
                'success'
                )
            </script>
        @endif
        @if (session()->has('successDelete'))
            <script>
                Swal.fire(
                'Good job!',
                'Suppression Cité Réussite!',
                'success'
                )
            </script>
        @endif
        <table class="table table-hover" id="ma-table">
          <thead>
            <tr>
              <th>#</th>
              <th>CODE CITE</th>
              <th>NOM CITE</th>
              <th>ADRSESSE DE CITE</th>
              <th>NOMBRE DE LOGEMENT</th>
              <th>AGENCE</th>
              <th>ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Cites as $cite)
            <tr>
              <td>{{$cite->id}}</td>
              <td>{{$cite->lib_cite}}</td>
              <td>{{$cite->nom_cite}}</td>
              <td>{{$cite->adresse_cite}}</td>
              <td>{{$cite->nb_logement}}</td>
              <td>{{$cite->agence}}</td>

              <td>
                <a href="/cite-edit/{{ $cite->id }}" class="btn btn-sm btn-primary">Modifier</a>
                <button onclick="supprimer({{$cite->id}})" class="btn btn-sm btn-danger">Supprimer</button>
              </td>
            </tr>
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
                            window.location.href = '/cite-delete/' + id;
                        }
                    })
                }
            </script>
            @endforeach
          </tbody>
        </table>
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
        {{-- pagination de listes dans tableau--}}
        {{$Cites->links()}}
      </div>
      @endsection
</body>
</html>
