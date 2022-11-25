<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png')}}">
    <title>Aqualines</title>
    <!-- chartist CSS -->
    <script src="{{ asset('assets/dist/Chart.bundle.js')}}"></script>
    <!-- needed css -->
    <link href="{{ asset('assets/dist/Chart.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/monstyle.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/style.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]><![endif]-->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>

<body>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('layouts.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('layouts.menu')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb border-bottom">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0">Tableau de bord</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="{{ route('home')}}">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tableau de bord</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Card Group  -->
                <!-- ============================================================== -->
                <div class="card-group">
                    <div class="card p-2 p-lg-3">
                        <div class="p-lg-3 p-2">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-circle btn-danger text-white btn-lg" href="javascript:void(0)">
                                <i class="ti-clipboard"></i>
                            </button>
                                <div class="ml-4" style="width: 38%;">
                                    <h4 class="font-light">Rechargements</h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                                    </div>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="display-7 mb-0" id="rechargement" style="font-size: 25px;">{{$Rechargement}} XOF</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card p-2 p-lg-3">
                        <div class="p-lg-3 p-2">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-circle btn-cyan text-white btn-lg" href="javascript:void(0)">
                                <i class="ti-wallet"></i>
                            </button>
                                <div class="ml-4" style="width: 38%;">
                                    <h4 class="font-light">Transactions</h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                                    </div>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="display-7 mb-0" id="transactions">{{$NombreDeTransactions}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card p-2 p-lg-3">
                        <div class="p-lg-3 p-2">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-circle btn-warning text-white btn-lg" href="javascript:void(0)">
                                <i class="fas fa-dollar-sign"></i>
                            </button>
                                <div class="ml-4" style="width: 38%;">
                                    <h4 class="font-light">Chiffre d'affaire</h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                                    </div>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="display-7 mb-0" id="chiffreDaffaires" style="font-size: 25px;">{{$chiffreDaffaires}} XOF</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Products yearly sales, Weather Cards Section  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Statistique Horaire</h5>
                                <div>
                                        <canvas id="myChart" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ====================================================================== --}}

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                    <h5 class="card-title text-uppercase">Statistique des transactions pour l'année {{$Annee}} </h5>
                                <h5 class="card-title text-uppercase"></h5>
                                <div>
                                        <canvas id="myChart2" height="120"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- =============================================================================== --}}
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                    <h5 class="card-title text-uppercase">Statistique des transactions pour l'année {{$Annee}} </h5>
                                <h5 class="card-title text-uppercase"></h5>
                                <div>
                                        <canvas id="myChart3" height="120"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- =============================================================================== --}}
                {{-- <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                    <h5 class="card-title text-uppercase">Statistique des transactions jouralière </h5>
                                <h5 class="card-title text-uppercase"></h5>
                                <div>
                                        <canvas id="canvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- ============================================================== -->
                <!-- User Table & Profile Cards Section  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase mb-0">Situation Generale des Gares</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap user-table mb-0">
                                    <thead>
                                        <tr>
                                    <th scope="col" class="border-0 text-uppercase font-medium pl-4">N°</th>
                                            <th scope="col" class="border-0 text-uppercase font-medium">Gare</th>
                                            <th scope="col" class="border-0 text-uppercase font-medium">Transaction</th>
                                            <th scope="col" class="border-0 text-uppercase font-medium">Voyages</th>
                                            <th scope="col" class="border-0 text-uppercase font-medium">Rechargements</th>
                                            <th scope="col" class="border-0 text-uppercase font-medium">Situation Périodique</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($gares as $gare)
                                        <tr>
                                            <td class="pl-4">{{$gare->NumeroGare}}</td>
                                            <td>
                                                <h5 class="font-medium mb-0">{{$gare->NomGare}}</h5>
                                                {{-- <span class="text-muted">{{$gare->ResponsableGare}}</span> --}}
                                            </td>
                                            <td>
                                                <h5 class="font-medium mb-0">{{$gare->transactions->count()}}</h5>
                                            </td>
                                            <td>
                                                <h5 class="font-medium mb-0">{{$gare->voyages->count()}}</h5>
                                            </td>
                                            <td>
                                                <h5 class="font-medium mb-0">{{$gare->recharges->sum('Montant')}}</h5>
                                            </td>
                                            <td>
                                                <a href="{{ route('gares.show', $gare)}}"><button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ti-eye"></i> </button></a>
                                            </td>
                        
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Todo list & Calender application  -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Social Cards  -->
               
                <!-- ============================================================== -->
                <!-- Chat App, Timeline & Chat Listing  -->
                <!-- ============================================================== -->
                
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('layouts.footer')
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <script src="{{ asset('dist/js/app.min.js')}}"></script>
    <script src="{{ asset('dist/js/app.init.js')}}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js')}}"></script>
    <!-- This Page JS -->
  
    <script src="{{ asset('assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{ asset('assets/libs/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('assets/libs/morris.js/morris.min.js')}}"></script>
    <script src="{{ asset('assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{ asset('dist/js/pages/calendar/cal-init.js')}}"></script>

<script>
    var chart3 =async function(){

        var url = "{{url('charts')}}";
        let objet = {};
        let myChart = document.getElementById('myChart').getContext('2d');
        let dataChart = [] ;
        

        function getRandomInt(max) {
            return Math.floor(Math.random() * Math.floor(max));
            }       

        $.get(url, function(response){

            chartobj = JSON.parse(response);
                
                for(let i=0; i< chartobj.length;i++){
                    let objData = [];
                    let obj = chartobj[i];
                    objData.push(obj.Miniut,obj.Un,obj.Deux,obj.Trois,obj.Quatre,obj.Cinq,obj.Six,obj.Sept,obj.Huit,obj.Neuf,obj.Dix,obj.Onze,obj.Douze,obj.Treize,obj.Quatorze,obj.Quinze,obj.Seize,obj.Dixsept,obj.Dixhuit,obj.Dixneuf,obj.Vingt,obj.Vingtun,obj.Vingtdeux,obj.Vingttrois);
                    dataChart.push({
                        label : chartobj[i].NomGare,
                        lineTension: 0.3,
                        backgroundColor:chartobj[i].Couleurs,
                        borderColor:chartobj[i].Couleur,
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(2,117,216,1)",
                        pointBorderColor: "rgba(255,255,255,0.8)",
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(2,117,216,1)",
                        pointHitRadius: 20,
                        pointBorderWidth: 2,
                        data : objData,
                        borderWith:1,
                        hoverBorderWidth:3,
                        // hoverBorderColor:'#000'
                        })      
                }
                console.log(dataChart);
                let massPopChart =  new Chart(myChart,{
                type: 'line', // bar, horizontalBarm, pie, line, doughnut, radar, polarArea
                data:{
                    labels:['0h','1h','2h','3h','4h','5h','6h','7h','8h','9h','10h','11h','12h','13h','14h','15h','16h','17h','18h','19h','20h','21h','22h','23h'],
                    datasets:dataChart,
                },
                options:{
                    title:{
                        display:false,
                        // text:'Statistique de transfert pour l\'année '+2019 ,
                        fontSize:25
                    },
                    legend:{
                        display:true,
                        position:'right',
                        labels:{
                            fontColor:'#000'
                        }
                    },
                    layout:{
                        padding:{
                            left:50,
                            right:0,
                            bottom:0,
                            top:0
                        }
                    },
                    tooltips:{
                        enable:true
                    }
                }
                });
            });

    };
</script>

<script>
    var chart1 =async function(){
        var url = "{{url('chartjs')}}";
        let objet = {};
        let myChart2 = document.getElementById('myChart2').getContext('2d');
        let dataSet = [] ;

        function getRandomInt(max) {
            return Math.floor(Math.random() * Math.floor(max));
            }       

        $.get(url, function(response){

           lstobj = JSON.parse(response);
               
                for(let i=0; i< lstobj.length;i++){
                    let objData = [];
                    let obj = lstobj[i];
                    objData.push(obj.Janvier,obj.Fevrier,obj.Mars,obj.Avril,obj.Mai,obj.Juin,obj.Juillet,obj.Aout,obj.Septembre,obj.Octobre,obj.Novembre,obj.Decembre);
                     dataSet.push({
                        label : lstobj[i].NomGare,
                        lineTension: 0.3,
                        backgroundColor:'rgba(255,255,255,0.1)',
                        borderColor:lstobj[i].Couleur,
                        backgroundColor: lstobj[i].Couleurs,
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(2,117,216,1)",
                        pointBorderColor: "rgba(255,255,255,0.8)",
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(2,117,216,1)",
                        pointHitRadius: 20,
                        pointBorderWidth: 2,
                        data : objData,
                        borderWith:1,
                        hoverBorderWidth:3,
                        
                        // hoverBorderColor:'#000'
                     })      
                }
                console.log(dataSet);
                let massPopChart =  new Chart(myChart2,{
                type: 'line', // bar, horizontalBarm, pie, line, doughnut, radar, polarArea
                data:{
                    labels:['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
                    datasets:dataSet,
                },
                options:{
                    title:{
                        display:false,
                        // text:'Statistique de transfert pour l\'année '+2019 ,
                        fontSize:25
                    },
                    legend:{
                        display:true,
                        position:'right',
                        labels:{
                            fontColor:'#000'
                        }
                    },
                    layout:{
                        padding:{
                            left:50,
                            right:0,
                            bottom:0,
                            top:0
                        }
                    },
                    tooltips:{
                        enable:true
                    }
                }
                });
            });

    };
</script>

<script>
    var chart2 =async function(){
        var url = "{{url('chartjs')}}";
        let objet = {};
        let myChart3 = document.getElementById('myChart3').getContext('2d');
        let dataSet = [] ;
    

        function getRandomInt(max) {
            return Math.floor(Math.random() * Math.floor(max));
            }       

        $.get(url, function(response){

           lstobj = JSON.parse(response);
               
                for(let i=0; i< lstobj.length;i++){
                    let objData = [];
                    let obj = lstobj[i];
                    objData.push(obj.Janvier,obj.Fevrier,obj.Mars,obj.Avril,obj.Mai,obj.Juin,obj.Juillet,obj.Aout,obj.Septembre,obj.Octobre,obj.Novembre,obj.Decembre);
                   
                     dataSet.push({
                        label : lstobj[i].NomGare,
                        lineTension: 0.3,
                        borderColor:lstobj[i].Couleur,
                        backgroundColor: lstobj[i].Couleurs,
                        pointRadius: 5,
                        borderWidth: 3,
                        data : objData,
                     })      
                }
                console.log(dataSet);
                let massPopChart =  new Chart(myChart3,{
                type: 'bar', // bar, horizontalBarm, pie, line, doughnut, radar, polarArea
                data:{
                    labels:['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
                    datasets:dataSet,
                },
                options:{
                    title:{
                        display:true,
                        // text:'Statistique de transfert pour l\'année '+2019 ,
                        fontSize:25
                    },
                    legend:{
                        display:true,
                        position:'top',
                        labels:{
                            fontColor:'#000'
                        }
                    },
                    layout:{
                        padding:{
                            left:50,
                            right:0,
                            bottom:0,
                            top:0
                        }
                    },
                    tooltips:{
                        enable:true
                    }
                }
                });
            });

    };
</script>

<script>
    $(document).ready(function(){
        chart1();
        chart2();
        chart3();
     });
</script>

<script>
    $(document).ready(function(){
    let url = "{{url('ajax')}}";
    let obj ;
    function updateDashboard(){
        setTimeout(function(){
            $.get(url,function(response){
                $('#rechargement').html(response.Rechargement+' '+'XOF')
                $('#transactions').html(response.NombreDeTransactions)
                $('#chiffreDaffaires').html(response.chiffreDaffaires+' '+'XOF')
            });
            updateDashboard();
        },
        1000);
    }
     updateDashboard();
});
</script>

</body>
</html>


</html>



 