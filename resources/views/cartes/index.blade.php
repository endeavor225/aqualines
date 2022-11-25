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
                        <h5 class="font-medium text-uppercase mb-0">Cartes</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="{{ route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Liste des Cartes</li>
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
                                <h4 class="card-title">Liste de tous les cartes</h4><br>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="liste" class="table table-striped border">
                                        <thead>
                                            <tr>
                                                <th>Client</th>
                                                <th>Numero de Carte</th>
                                                <th>Solde</th>
                                                <th>Téléphone</th>
                                                <th>Date de Création</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($cartes as $carte)
                                        <tr>
                                            <td>
                                                {{$carte->client->NomClient}} {{$carte->client->PrenomClient}}
                                            </td>
                                            <td>
                                                {{$carte->NumeroCarte}}
                                            </td>
                                            <td>
                                                {{$carte->Solde}}
                                            </td>
                                            <td>
                                                {{$carte->client->TelephoneClient}}
                                            </td>
                                            <td>
                                                {{$carte->created_at}}
                                            </td>
                                            <td width="175">
                                                <form action="{{ route('cartes.update', $carte) }}" method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <div>
                                                        <!-- add class p-switch -->
                                                        <div class="pretty p-switch">
                                                            <input {{ $carte->Statut ? 'checked' : ''}}
                                                            onchange="this.form.submit()" type="checkbox" name="statut" id="statut" onclick="return confirm('Êtes-vous sûr de vouloir bloquer ou débloquer cette carte ?')" />
                                                                @if ($carte->Statut ==0)
                                                                    <span style="font-size: 12px;" class="badge badge-pill text-white font-medium badge-danger label-rouded"  >Bloquer la carte</span>
                                                                @else 
                                                                    <span style="font-size: 12px;" class="badge badge-pill text-white font-medium badge-info label-rouded">Débloquer</span>
                                                                @endif
                                                        </div>
                                                        @if ($carte->Statut ==1)
                                                        <a href="{{ route('cartes.edit', $carte) }}">
                                                            <span style="font-size: 12px;" class="badge badge-pill text-white font-medium badge-success label-rouded">Transfert</span>
                                                        </a>
                                                        @endif
                                                        
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                            
                                        </tbody>
                                        <tfoot>
                                            {{-- <tr>
                                                <th>Nom Client</th>
                                                <th>Prenom Client</th>
                                                <th>Email Client</th>
                                                <th>Téléphone</th>
                                                <th>Date de Création</th>
                                            </tr> --}}
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <b class="ml-5 pl-5" style="font-size:32px;">Êtes-vous sûr ?</b><br>
                <span class="ml-5" style="font-size:20px;">Vous ne pourrez pas revenir en arrière !</span>

                <form action="{{ route('cartes.update', $carte) }}" method="POST">
                        @method('PATCH')
                    @csrf
                    <div>
                        <!-- add class p-switch -->
                        <div class="pretty p-switch">
                            <input {{ $carte->Statut ? 'checked' : ''}}
                            onchange="this.form.submit()" type="checkbox" name="statut" id="statut" />
                                @if ($carte->Statut ==0)
                                    <span style="font-size: 12px;" class="badge badge-pill text-white font-medium badge-info label-rouded"  data-toggle="modal" data-target="#exampleModalCenter">Activer</span>
                                @else 
                                    <span style="font-size: 12px;" class="badge badge-pill text-white font-medium badge-danger label-rouded"  data-toggle="modal" data-target="#exampleModalCenter">Bloquer</span>
                                @endif 
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
            </div>
          </div>
        </div>
      </div>
               
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