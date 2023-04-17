<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouveau Vente</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @extends("layout.dashboard")

    @section("contenu")
    <div class="container">
        <h2 class="h3 mb-0 text-gray-800">Validation de 2<sup>em</sup> Payement:</h2><br>
        <form action="/deuxieme-store" class="was-validated" method="POST">
            @csrf

        @if (session()->has('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session() -> get('errors')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="uname">Numero de Client:</label>
                          <select name="cli" class="form-control">
                          @foreach ($resultats as $cli)
                              <option value="{{ $cli->id_cl}}" class="form-control" title="client N°{{ $cli->id_cl}}">{{ $cli->nom_cli}} {{ $cli->prenom_cli}}: {{ $cli->tel_cli}}</option>
                          @endforeach
                          </select>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Svp selectionner Numero Client</div>
                      </div>

                      <div class="form-group">
                          <label for="uname">Numero de logement:</label>
                          <select name="log" class="form-control">
                            @foreach ($logements as $log)
                                <option value="{{ $log->id_log}}" class="form-control" title="acheté par client N°{{ $log->id_cli}}">{{ $log->num_log}}</option>
                            @endforeach
                        </select>
                          <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Svp selectionner Numero Client</div>
                        </div>

                      <div class="form-group">
                          <label for="uname">Montant deuxième tranche:</label>
                          <input type="number" class="form-control" name="montant_d" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Svp saisir le montant payé.</div>
                      </div>

                      <button type="submit" class="btn btn-info mt-4">ENREGISTRER</button>
                </div>
            </div>
          </form>
        </div>
@endsection
</body>
</html>
