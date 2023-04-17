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
        <h2 class="h3 mb-0 text-gray-800">Validation de Nouveau Vente :</h2><br>
        <form action="/vente-store" class="was-validated" method="POST">
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
                        <select name="id_cli" class="form-control">
                          @foreach ($Clients as $cli)
                              <option value="{{ $cli->id}}" class="form-control" title="{{ $cli->id}}">{{ $cli->nom_cli}} {{ $cli->prenom_cli}}: {{ $cli->tel_cli}}</option>
                          @endforeach
                      </select>
                        <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Svp selectionner Numero Client</div>

                      </div>
                      <div class="form-group">
                          <label for="uname">Numero de logement :</label>
                          <select name="num_log" class="form-control">
                          @foreach ($Logements as $log)
                              <option value="{{ $log->id}}" class="form-control">{{$log->num_log}}</option>
                          @endforeach
                          </select>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Svp Completer Num logement.</div>
                      </div>
                      <div class="form-group">
                          <label for="uname">Type de Vente:</label>
                          <select name="type_vente" class="form-control">
                                  <option value="Par Crédit" class="form-control">Par crédit</option>
                                  <option value="Par montant" class="form-control">Par montant</option>
                              </select>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Svp selectionner type de vente.</div>
                      </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="uname">Mode de payement:</label>
                        <select name="mode_paye" class="form-control">

                            <option value="Une tranche" class="form-control">Une tranche</option>
                            <option value="Deux tranche" class="form-control">Deux tranche</option>

                        </select>
                        <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Svp selectionner mode payement.</div>
                    </div>

                <div class="form-group">
                    <label for="uname">Date de vente:</label>
                    <input type="date" class="form-control" name="date_vente" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Svp Completer date vente.</div>
                </div>

                <div class="form-group">
                    <label for="uname">Montant payé:</label>
                    <input type="number" class="form-control" name="montant_paye" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Svp saisir le montant payé.</div>
                </div>

                </div>
            </div>
            <button type="submit" class="btn btn-info mt-4">ENREGISTRER</button>
          </form>
    </div>
@endsection
</body>
</html>
