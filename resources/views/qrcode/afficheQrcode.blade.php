<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qr code Vente</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @extends("layout.dashboard")

    @section("contenu")
        <div class="container">
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-5 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Entrez Num Vente :</div>

                                        <form action="{{ routes('afficher_qrcode') }}" method="POST"
                                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                        <div class="input-group">
                                            @csrf
                                            <input type="number" class="form-control bg-light border-0 small" placeholder="Saisir Num vente..."
                                                aria-label="Search" aria-describedby="basic-addon2" name="num_vente" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fas fa-search fa-sm ">Appercu Qrcode</i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="qrcode"></div>
$('form').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: '{{ route('generer_qrcode') }}',
        data: $(this).serialize(),
        success: function(response) {
            if (response.success) {
                $('#qrcode').html('<img src="'+response.url+'">');
            } else {
                alert(response.message);
            }
        },
        error: function() {
            alert('Une erreur

        </div>

@endsection
</body>
</html>
