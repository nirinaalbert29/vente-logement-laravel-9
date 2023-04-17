<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout logement</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @extends("layout.dashboard")

    @section("contenu")
    <div class="container">
        <h2 class="h3 mb-0 text-gray-800">Ajoutez nouveau Logement :</h2><br>
        <form action="/logement-ajout" class="was-validated" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="uname">Numero Logement:</label>
                        <input type="text" class="form-control" placeholder="Saisir Numero Logement" name="num_log" required>
                        <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Svp Completer Numero Logement.</div>
                      @if ($errors->has('num_log'))
                          <p class="text-danger">{{$errors->first('num_log')}}</p>
                      @endif

                      </div>
                      <div class="form-group">
                          <label for="uname">Nombre Chambre:</label>
                          <input type="text" class="form-control" placeholder="Saisir Nombre Chambre" name="nb_chambre" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Svp Completer Nombre Chambre.</div>
                      </div>
                      <div class="form-group">
                          <label for="uname">Superficie Logement:</label>
                          <input type="number" class="form-control" placeholder="Saisir Superficie Logement en Km²" name="superficie" title="Saisir Superficie de Logement en Km²" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Svp Completer Superficie Logement.</div>
                      </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="uname">Code de cité:</label>
                        <select name="lib_cite" class="form-control">
                            @foreach ($Cite as $city)
                            <option value="{{ $city->lib_cite}}" class="form-control">{{ $city->lib_cite}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="uname">Prix Logement:</label>
                        <input type="text" class="form-control" placeholder="Saisir Prix Logement" name="prix_log" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Svp Completer Prix Logement.</div>
                    </div>
                    <button type="submit" class="btn btn-info mt-4">ENREGISTRER</button>
                </div>
            </div>
          </form>
        </div>
@endsection
</body>
</html>
