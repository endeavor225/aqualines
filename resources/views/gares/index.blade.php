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
                        <h5 class="font-medium text-uppercase mb-0">Gare</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="{{ route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Liste des Gares</li>
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
                                <h4 class="card-title">Liste de tous les clients
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
                                            Ajout de Gare
                                    </button>
                                </h4><br>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="liste" class="table table-striped border">
                                        <thead>
                                            <tr>
                                                <th>Numero de Gare</th>
                                                <th>Nom de Gare</th>
                                                <th>Responsable Gare</th>
                                                <th>Téléphone</th>
                                                <th>Email</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($gares as $gare)
                                            <tr>
                                                <td>
                                                    {{$gare->NumeroGare}}
                                                </td>
                                                <td>
                                                    {{$gare->NomGare}}
                                                </td>
                                                <td>
                                                    {{$gare->ResponsableGare}}
                                                </td>
                                                <td>
                                                    {{$gare->TelephoneGare}}
                                                </td>
                                                <td>
                                                    {{$gare->AdresseGare}} 
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
              <h5 class="modal-title" id="exampleModalLongTitle"><b>Nouvelle Gare</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <form action="{{ route('gares.store')}}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="NumeroGare">Numero</label>
                        <input type="text" class="form-control" name="NumeroGare" id="NumeroGare" placeholder="Numero de la Gare" aria-describedby="inputGroupPrepend" required>
                                                    
                        <div class="invalid-feedback">
                            Le champ Numero est obligatoire.
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="NomGare">Nom de la Gare</label>
                      <input type="text" class="form-control" name="NomGare" id="NomGare" placeholder="Gare" aria-describedby="inputGroupPrepend" required>
                                                
                    <div class="invalid-feedback">
                        Le champ Nom de la Gare est obligatoire.
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="ResponsableGare">Nom du Responsable de la Gare</label>
                        <input type="text" class="form-control" name="ResponsableGare" id="ResponsableGare" placeholder="Responsable de la Gare" aria-describedby="inputGroupPrepend" required>
                                                    
                        <div class="invalid-feedback">
                            Le champ Responsable de la Gare est obligatoire.
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="AdresseGare">Email</label>
                      <input type="email" class="form-control" name="AdresseGare" id="AdresseGare" placeholder="Email de la gare" aria-describedby="inputGroupPrepend" required>
                                               
                      <div class="invalid-feedback">
                        Le champ Email est obligatoire.
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="TelephoneGare">Téléphone</label>
                                <input type="text" class="form-control" name="TelephoneGare" id="TelephoneGare" placeholder="Contact" aria-describedby="inputGroupPrepend" maxlength="8" minlength="8" required>
                                                            
                                <div class="invalid-feedback">
                                    Le champ Téléphone est obligatoire.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Couleur">Couleur</label>
                                <div class="input-group">
                                    <select name="Couleur" id="Couleur" class="form-control" aria-describedby="inputGroupPrepend" required>
                                            <option value="">Choississez une couleur</option>
                                            <option value="rgb(2,117,216)">Bleu</option>
                                            <option value="rgb(119, 181, 254)">Bleu ciel</option>
                                            <option value="rgb(96, 96, 96)">Gris</option>
                                            <option value="rgb(255, 228, 0)">Jaune</option>
                                            <option value="rgb(88, 41, 0)">Marron</option>
                                            <option value="rgb(255, 120, 0)">Orange</option>
                                            <option value="rgb(255, 0, 0)">Rouge</option>
                                            <option value="rgb(253, 108, 158)">Rose</option>   
                                            <option value="rgb(0, 255, 0)">Vert</option>
                                            <option value="rgb(102, 0, 153)">Violet</option>
                                        </select>
                                        <div class="invalid-feedback">
                                                Le champ Couleur est obligatoire.
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                    </script>
    
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
</body>

</html>