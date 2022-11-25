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
    <!-- This page plugin CSS -->
    <link href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/extra-libs/toastr/dist/build/toastr.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet">
    <link href="{{ asset('assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet')}}">
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
                        <h5 class="font-medium text-uppercase mb-0">Message</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="{{ route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Message</li>
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
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="material-card card">
                            <div class="card-body">
                                <h4 class="card-title">Message</h4><br>
                                <h6 class="card-subtitle"></h6>
                                
                                <form class="" action="{{ route('sms.store')}}" method="POST" novalidate>
                                        @csrf
                                        <div class="card-body border-top">
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="input-field mt-0 mb-0">
                                                        <textarea name="message" id="message" class="form-control border-0 @error('message') is-invalid @enderror" placeholder="Saississez le message ici..." value="{{ old('message') }}" autofocus></textarea>

                                                        @error('message')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-primary float-right text-white" type="submit">Envoi <i class="fas fa-paper-plane"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="bg-light p-3 d-flex align-items-center do-block">
                                            <div class="btn-group mt-1 mb-1">
                                                <div class="pretty p-svg p-curve">
                                                        <input type="checkbox" class="custom-control-input sl-all" id="cstall">
                                                        <div class="state p-success">
                                                            <!-- svg path -->
                                                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                            </svg>
                                                            <label class="custom-control-label" for="cstall">Tout sélectionner</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                    <table class="table email-table no-wrap table-hover v-middle">
                                                        <tbody>
                                                                @if (count($cartes) > 0)
                                                                @foreach ($cartes->all() as $carte)
                                                            <tr class="unread">
                                                                <td class="chb pl-3">
                                                                    <div class="pretty p-svg p-curve">
                                                                        <input type="checkbox" name="mobile[]" value="+225{{$carte->client->TelephoneClient}}" />
                                                                        <div class="state p-success">
                                                                            <!-- svg path -->
                                                                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                                            </svg>
                                                                            <label></label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="user-name">
                                                                    <span class="time text-dark">{{$carte->client->NomClient}} {{$carte->client->PrenomClient}}</span>
                                                                </td>
                                                                    <td class="max-texts">  <span class="text-dark font-light"> {{$carte->NumeroCarte}}</span>
                                                                </td>
                                                            
                                                                <td class="time text-muted">
                                                                    {{$carte->client->TelephoneClient}}
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                    {{-- <span class="float-right">{{ $cartes->links() }}</span> --}}
                                                </div>
                                        
                                {{-- <div class="table-responsive">
                                    <table class="table no-wrap user-table mb-0">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nom du Client</th>
                                            <th>Numero de Carte</th>
                                            <th>Téléphone</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            @if (count($cartes) > 0)
                                                @foreach ($cartes->all() as $carte)
                                                <tr>
                                                        <td>
                                                            <input type="checkbox" name="mobile[]" value="+225{{$carte->client->TelephoneClient}}">
                                                        </td>
                                                        <td>
                                                            {{$carte->client->NomClient}} {{$carte->client->PrenomClient}}
                                                        </td>
                                                        <td>
                                                            {{$carte->NumeroCarte}}
                                                        </td>
                                                        <td>
                                                            {{$carte->client->TelephoneClient}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div> --}}
                                
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>

                
                    <!-- Action part -->
                    <!-- Mail list-->
                   
               
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
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
    <!--This page plugins -->
    <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/toastr/dist/build/toastr.min.js')}}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('dist/js/pages/email/email.js')}}"></script>
    {{-- <script src="{{ asset('assets/libs/sweetalert2/sweet-alert.init.js')}}"></script> --}}

    <script>
        $(document).ready(function() {
            $('#liste').dataTable( {
                "language": {
                    "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                    "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                    "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                    "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                    "sInfoPostFix":    "",
                    "sInfoThousands":  ",",
                    "sLengthMenu":     "Afficher _MENU_ éléments",
                    "sLoadingRecords": "Chargement...",
                    "sProcessing":     "Traitement...",
                    "sSearch":         "Rechercher :",
                    "sZeroRecords":    "Aucun élément correspondant trouvé",
                    "oPaginate": {
                        "sFirst":    "Premier",
                        "sLast":     "Dernier",
                        "sNext":     "Suivant",
                        "sPrevious": "Précédent"
                    },
                    "oAria": {
                        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                    },
                    "select": {
                            "rows": {
                                "_": "%d lignes sélectionnées",
                                "0": "Aucune ligne sélectionnée",
                                "1": "1 ligne sélectionnée"
                            } 
                    }
                }
            } );
        } );
    </script>
    <script>
        @if (Session::has('success'))
            toastr.success('{{ Session::get('success')}}') 
        @endif
    </script>
    
    <script>
            $('#sa-warning').click(function () {
                 Swal.fire({
                     title: "Êtes-vous sûr ?",
                     text: "Vous ne pourrez pas revenir en arrière !",
                     type: "warning",
                     showCancelButton: true,
                     confirmButtonColor: "#006600",
                     confirmButtonText: "Oui, Bloquer !",
                     cancelButtonColor: "#ff0000",
                     cancelButtonText: 'Annuler',
                 }, function () {
                     swal("Deleted!", "Your imaginary file has been deleted.", "success");
                 });
             });
         </script>
</body>

</html>