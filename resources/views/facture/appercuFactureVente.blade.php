<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture de Vente</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @extends("layout.dashboard")

    @section("contenu")
        <div class="container">

            <div class="row">

                <!-- Area Chart -->
                @foreach ($factur as $fact)
                <div class="col-xl-8" id="print">
                    <div class="card shadow mb-10">
                        <!-- Card Header - Dropdown -->

                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Facture de Vente N° {{$fact->id_vente}}</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">ACTION :</div>
                                    <a class="dropdown-item" onclick="PrintTable()" href="#">Imprimer</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body container-fluide">
                            <div class="chart-area">
                                <p>Date vente: {{$fact->date_vente}}</p>
                                <p>Nom Client: {{$fact->nom_cli}}</p>
                                <p>Prenom client: {{$fact->prenom_cli}}</p>
                                <p>Numero logement :{{$fact->num_log}}</p>
                                <p>Type de vente :{{$fact->type_vente}}</p>
                                <p>Prix logement: {{$fact->prix_log}}Ar</p>
                                <p>Mode de Payement: {{$fact->mode_paye}}</p>
                                <p>Montant Payé: {{$fact->montant_paye}}Ar</p>
                                <p>Reste à payer: {{$fact->reste}}Ar</p>

                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div><br>
            <a href="/facturationVente" class="btn btn-danger">Retour</a>
        </div>


        <script type="text/javascript">
            function PrintTable() {
                var printWindow = window.open('', '', 'height=0,width=900');
                printWindow.document.write('<html><head><title>Compte de client</title>');

                //Print the Table CSS.
                printWindow.document.write('<style type = "text/css">');
                printWindow.document.write('</style>');
                printWindow.document.write('</head>');

                //Print the DIV contents i.e. the HTML Table.
                printWindow.document.write('<body>');
                var divContents = document.getElementById("print").innerHTML;
                printWindow.document.write(divContents);
                printWindow.document.write('</body>');

                printWindow.document.write('</html>');
                printWindow.document.close();
                printWindow.print();
            }
            </script>
@endsection
</body>
</html>
