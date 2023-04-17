<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>modification Cité</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @extends("layout.dashboard")

    @section("contenu")
    <div class="container">
        <h2 class="h3 mb-0 text-gray-800">Modification cité :</h2>
        <form action="/cite-update/{{$cite->id}}" class="was-validated" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="uname">Libele Cité:</label>
                        <input type="text" class="form-control" placeholder="Saisir code cité" name="lib_cite" value="{{ $cite->lib_cite}}" required>
                        <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Svp Completer code cité.</div>
                      </div>
                      <div class="form-group">
                          <label for="uname">Nom cité:</label>
                          <input type="text" class="form-control" placeholder="Saisir nom cite" name="nom_cite" value="{{ $cite->nom_cite}}" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Svp Completer nom cite.</div>
                      </div>
                      <div class="form-group">
                          <label for="uname">Adresse Cité:</label>
                          <input type="text" class="form-control" placeholder="Saisir Adresse cité" name="adresse_cite" value="{{ $cite->adresse_cite}}" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Svp Completer Adresse cité.</div>
                      </div>
                      <div class="form-group">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="uname">Nombre de logement:</label>
                    <input type="number" class="form-control" placeholder="Saisir  nombre logement" name="nb_logement" value="{{ $cite->nb_logement}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Svp Completer nombre logement.</div>
                </div>
                <div class="form-group">
                    <label for="uname">Agence:</label>
                    <input type="text" class="form-control" placeholder="Saisir agence" name="agence" value="{{ $cite->agence}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Svp Completer agence.</div>
                </div>
                <button type="submit" class="btn btn-info mt-4">MODIFIER</button>
                </div>
            </div>


          </form>
        </div>
@endsection
</body>
</html>
