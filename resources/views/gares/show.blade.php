<!DOCTYPE html>
<html dir="ltr" lang="en">

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
        <!-- This Page CSS -->
        <link href="{{ asset('assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
        <link href="{{ asset('dist/js/pages/chartist/chartist-init.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/extra-libs/jvector/jvector.css')}}" rel="stylesheet"/>
        <link href="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
        <link href="{{ asset('assets/libs/morris.js/morris.css')}}" rel="stylesheet">
        <!-- needed css -->
        <link href="{{ asset('dist/css/style.min.css')}}" rel="stylesheet">
    </head>

<body>
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
        
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('layouts.header')

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
                        <h5 class="font-medium text-uppercase mb-0">{{$gares->NomGare}} </h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="index.html">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gare</li>
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
                <!-- First Cards Row  -->
                <!-- ============================================================== -->

                <div class="card-group">
                    <div class="card p-2 p-lg-3">
                        <div class="p-lg-3 p-2">
                            <div class="">
                                Choisissez une date ou une période <br><br>
                                <form class="form-inline" action="{{ route('periodes.store')}}" method="POST" novalidate>
                                @csrf
                                <div class="form-group">
                                    <label for="date" class="mr-2">Date debut :</label>
                                    <input type="date" class="form-control mr-4 @error('date') is-invalid @enderror" name="date" id="date" value="{{ old('date') }}" >
{{--                                             
                                        @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror --}}
                                </div>
                                <div class="form-group">
                                    <label for="date" class="mr-2">Date fin :</label>
                                    <input type="date" class="form-control mr-4 @error('date2') is-invalid @enderror" name="date2" id="date2" value="{{ old('date2') }}">
                                </div>
                                <div class="d-none">
                                        <input type="text" class="form-control @error('NomGare') is-invalid @enderror" name="id" id="is"  aria-describedby="inputGroupPrepend" value="{{ $gares->id }}" >
                                </div>
                                 
                                    <button class="btn btn-primary" type="submit">Valider</button>
                                
                                </form>
{{--                                 
                                <div class="ml-4 mt-3" style="width: 38%;">
                                    <button class="btn btn-primary" type="submit">Valider</button>
                                </div> --}}
                                {{-- <div class="ml-auto">
                                    <h2 class="display-7 mb-0" style="font-size: 25px;">{{$Rechargement}} XOF</h2>
                                </div> --}}
                            </div>
                            
                        </div>
                    </div>
                </div>



                {{-- ========================================= --}}
                <div class="card-group" style="position: relative; top: -30px;">
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
                                    <h2 class="display-7 mb-0" style="font-size: 25px;">{{$Rechargement}} XOF</h2>
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
                                    <h2 class="display-7 mb-0">{{$NombreDeTransactions}} </h2>
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
                                    <h2 class="display-7 mb-0" style="font-size: 25px;">{{$chiffreDaffaires}} XOF</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ================================CHIFFRE D'AFFAIRE============================ --}}
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Chiffre d'affaire de la veille</h5>
                                <div class="text-right">
                                    <span class="text-muted">Revenu de la veille</span>
                                    <h2 class="mt-2 display-7">{{$caHier}} XOF</h2>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Chiffre d'affaire MENSUEL</h5>
                                <div class="text-right">
                                    <span class="text-muted">Revenu mensuel</span>
                                    <h2 class="mt-2 display-7"> {{$caMois}} XOF</h2>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Cumul Chiffre d'affaire ANNUEL</h5>
                                <div class="text-right">
                                    <span class="text-muted">Revenu annuel</span>
                                    <h2 class="mt-2 display-7">{{$caAnnee}} XOF</h2>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- ===============================RECHARGEMENT============================= --}}
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Rechargement de la veille</h5>
                                <div class="text-right">
                                    <span class="text-muted">Revenu de la veille</span>
                                    <h2 class="mt-2 display-7">{{$RHier}} XOF</h2>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Rechargement MENSUEL</h5>
                                <div class="text-right">
                                    <span class="text-muted">Revenu mensuel</span>
                                    <h2 class="mt-2 display-7"> {{$RMois}} XOF</h2>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Cumul Rechargement ANNUEL</h5>
                                <div class="text-right">
                                    <span class="text-muted">Revenu annuel</span>
                                    <h2 class="mt-2 display-7">{{$RAnnee}} XOF</h2>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-Light" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 {{-- ===============================TRANSACTION============================= --}}
                 <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Transactions de la veille</h5>
                                <div class="text-right">
                                    <span class="text-muted">Transaction de la veille</span>
                                    <h2 class="mt-2 display-7">{{$THier}}</h2>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Transactions MENSUELLES</h5>
                                <div class="text-right">
                                    <span class="text-muted">Transactions mensuelles</span>
                                    <h2 class="mt-2 display-7"> {{$TMois}}</h2>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Cumul Transaction ANNUELLES</h5>
                                <div class="text-right">
                                    <span class="text-muted">Transactions annuelles</span>
                                    <h2 class="mt-2 display-7">{{$TAnnee}}</h2>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Country and Visit, Traffic cards Row  -->
                <!-- ============================================================== -->
                {{-- <div class="row">
                    
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="p-3">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h4 class="card-title text-uppercase">Notification</h4>
                                        <h5 class="card-subtitle mb-0">Last 5 Days</h5>
                                    </div>
                                    <div class="ml-auto">
                                        <select class="form-control">
                                            <option>January 2018</option>
                                            <option>February 2018</option>
                                            <option>March 2018</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="message-box p-3 bg-light">
                                <ul class="list-style-none">
                                    <!-- Message -->
                                    <li class="d-flex py-3">
                                        <div class="user-img">
                                            <span class="round bg-primary">
                                                <i class="mdi mdi-email"></i>
                                            </span>
                                        </div>
                                        <div class="mail-contnet ml-3">
                                            <h5 class="mb-0">You have 3 new messages</h5>
                                            <span class="mail-desc d-block text-muted">Daniel Kristeen, Hanna Giover, Jeffry Brown</span>
                                            <span class="time d-block font-medium">9:30 AM</span>
                                        </div>
                                    </li>
                                    <!-- Message -->
                                    <li class="d-flex py-3">
                                        <div class="user-img">
                                            <span class="round bg-danger">
                                                <i class="mdi mdi-earth"></i>
                                            </span>
                                        </div>
                                        <div class="mail-contnet ml-3">
                                            <h5 class="mb-0">Newsfeed available </h5>
                                            <span class="mail-desc d-block text-muted">Todays headlines : Breakdancing Grandma Proves ..</span>
                                            <span class="time d-block font-medium">9:10 AM</span>
                                        </div>
                                    </li>
                                    <!-- Message -->
                                    <li class="d-flex py-3">
                                        <div class="user-img">
                                            <span class="round bg-success">
                                                <i class="mdi mdi-currency-usd"></i>
                                            </span>
                                        </div>
                                        <div class="mail-contnet ml-3">
                                            <h5 class="mb-0">2 Invoices to pay</h5>
                                            <span class="mail-desc d-block text-muted">$3500 from Krishnan, $2000 from Akhil</span>
                                            <span class="time d-block font-medium">9:08 AM</span>
                                        </div>
                                    </li>
                                    <!-- Message -->
                                    <li class="d-flex py-3">
                                        <div class="user-img">
                                            <span class="round">
                                                <i class="mdi mdi-comment-check-outline"></i>
                                            </span>
                                        </div>
                                        <div class="mail-contnet ml-3">
                                            <h5 class="mb-0">15 New comments</h5>
                                            <span class="mail-desc d-block text-muted">Jhonny : Hey this stuff is awesome and how can i ..</span>
                                            <span class="time d-block font-medium">9:02 AM</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- ============================================================== -->
                <!-- Country Visit, Weather cards Row  -->
                <!-- ============================================================== -->
                {{-- <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h4 class="card-title text-uppercase">Top Selling</h4>
                                        <h5 class="card-subtitle mb-0">Last 5 Days</h5>
                                    </div>
                                    <div class="ml-auto">
                                        <select class="form-control">
                                            <option>January 2018</option>
                                            <option>February 2018</option>
                                            <option>March 2018</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="morris-line-chart" style="height: 390px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Top Earning</h5>
                                <div id="basic-line" style="height:400px;"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- ============================================================== -->
                <!-- Sales cards & Carousel Row  -->
                <!-- ============================================================== -->
                
            </div>
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
    <script src="{{ asset('assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{ asset('dist/js/pages/chartist/chartist-plugin-tooltip.js')}}"></script>
    <script src="{{ asset('assets/libs/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('assets/libs/morris.js/morris.min.js')}}"></script>
    <script src="{{ asset('assets/libs/echarts/dist/echarts-en.min.js')}}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard6.js')}}"></script>
</html>