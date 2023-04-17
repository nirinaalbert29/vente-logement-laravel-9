<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout Clients</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @extends("layout.dashboard")

    @section("contenu")
    <div class="container">
        <h2 class="h3 mb-0 text-gray-800">Ajout Nouveau Client</h2><br>
        <form action="/client-store" class="was-validated" method="POST">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="uname">NOM CLIENT:</label>
                        <input type="text" class="form-control" placeholder="Saisir Nom client" name="nom_cli" required>
                        <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Svp Completer votre nom.</div>
                      </div>
                      <div class="form-group">
                          <label for="uname">PRENOM CLIENT:</label>
                          <input type="text" class="form-control" placeholder="Saisir Prenom client" name="prenom_cli" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Svp Completer votre Prenom.</div>
                      </div>
                      <div class="form-group">
                          <label for="uname">ADRESSE CLIENT:</label>
                          <input type="text" class="form-control" placeholder="Saisir Adresse client" name="adresse_cli" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Svp Completer votre Adresse.</div>
                      </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="uname">LIEU DE TRAVAILLE:</label>
                        <input type="text" class="form-control" placeholder="Saisir Lieu de travail" name="lieu_cli" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Svp Completer votre Lieu de travail.</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">TELEPHONE:</label>
                        <input type="text" class="form-control" placeholder="Saisir Telephone client" name="tel_cli" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Svp Completer votre Telephone.</div>
                    </div>
                    <button type="submit" class="btn btn-info mt-4">ENREGISTRER</button>
                </div>
            </div>

          </form>
        </div>
@endsection
</body>
</html>
