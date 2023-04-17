<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes des Clients</title>

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- autres balises meta, title, etc -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

</head>
<body>
    @extends("layout.dashboard")

    @section("contenu")
    <div class="container">
        <h2 class="h3 mb-0 text-gray-800">Listes des clients:</h2><br>
        @if (session()->has('success'))
            <script>
                Swal.fire(
                'Good job!',
                'Ajout Client Réussite!',
                'success'
                )
            </script>
        @endif
        @if (session()->has('successDelete'))
        <script>
            Swal.fire(
            'Good job!',
            'Suppression Client Réussite!',
            'success'
            )
        </script>
        @endif
        @if(session()->has('error'))
       <script>
             Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Une erreur est survenue lors de la suppression du client,le client qui a déjà fait un vente ne peut pas supprimer!',
          })
       </script>
        @endif
        <table class="table table-hover" id="ma-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nom client</th>
              <th>Prenom</th>
              <th>Adresse</th>
              <th>Lieu travail</th>
              <th>Telephone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Client as $cli)
            <tr>
              <td>{{$cli->id}}</td>
              <td>{{$cli->nom_cli}}</td>
              <td>{{$cli->prenom_cli}}</td>
              <td>{{$cli->adresse_cli}}</td>
              <td>{{$cli->lieu_cli}}</td>
              <td>{{$cli->tel_cli}}</td>

              <td>
                <a href="/client-edit/{{ $cli->id }}" class="btn btn-sm btn-primary">Modifier</a>
                <button onclick="supprimer({{$cli->id}})" class="btn btn-sm btn-danger">Supprimer</button>
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
                            window.location.href = '/client-delete/' + id;
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
        {{$Client->links()}}
      </div>


{{--
      <script>
        function deleteRecord(id) {
    Swal.fire({
        title: 'Êtes-vous sûr de vouloir supprimer cet enregistrement ?',
        text: "Cette action est irréversible.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Supprimer'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si l'utilisateur confirme la suppression, vous pouvez effectuer la suppression ici
            axios.delete('/records/' + id)
                .then(response => {
                    // Si la suppression est réussie, vous pouvez afficher un message de succès
                    Swal.fire(
                        'Supprimé!',
                        'L\'enregistrement a été supprimé avec succès.',
                        'success'
                    );
                })
                .catch(error => {
                    // Si la suppression échoue, vous pouvez afficher un message d'erreur
                    Swal.fire(
                        'Erreur!',
                        'Une erreur est survenue lors de la suppression de l\'enregistrement.',
                        'error'
                    );
                });
        }
    })
}

      </script>
      <button onclick="deleteRecord({{ $cli->id }})">supprimer</button> --}}
      @endsection
</body>
</html>
