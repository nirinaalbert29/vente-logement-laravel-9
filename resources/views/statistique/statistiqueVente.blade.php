<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Statistique de Vente</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @extends("layout.dashboard")

    @section("contenu")
        <div class="container">

            <div class="row">

                <!-- Area Chart -->

                <div class="col-xl-8" id="print">
                    <div class="card shadow mb-10">
                        <!-- Card Header - Dropdown -->

                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Statistique de Logement Vendu</h6>
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

                                <canvas id="myChart"></canvas>

                                <script>
                                    var ctx=document.getElementById("myChart").getContext("2d");
                                    var labels = [];
                                    var data = [];

                                    @foreach ($statistique as $stat)
                                        labels.push("{{$stat->num_log}}");
                                        data.push({{$stat->prix_log}});
                                    @endforeach


                                    var chart=new Chart(ctx,{
                                      type: "bar",
                                      data: {
                                        labels: labels,
                                        datasets: [{
                                          label: "Prix logement",
                                          backgroundColor: ["#8c8cd9", "red", "brown","red","#333399"],
                                          borderColor: [ "green","yellow", "blue", "purple","brown"],
                                          data: 0,data,
                                        }],
                                      },
                                      options: {}
                                    })
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
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
