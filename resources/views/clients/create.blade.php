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
                        <h5 class="font-medium text-uppercase mb-0">Inscription clients</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="{{ route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Nouveau Client</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Formulaire d'inscription des nouveaux clients</h4><br>
                            <form class="" action="{{ route('clients.store')}}" method="POST" novalidate>
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="NomClient">Nom de famille</label>
                                        <input type="text" class="form-control  @error('NomClient') is-invalid @enderror" id="NomClient" placeholder="Votre Nom de famille" name="NomClient" value="{{ old('NomClient') }}">
                                        
                                        @error('NomClient')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="PrenomClient">Prenom(s)</label>
                                        <input type="text" class="form-control @error('PrenomClient') is-invalid @enderror" id="PrenomClient" placeholder="Votre prenom(s)" name="PrenomClient" value="{{ old('PrenomClient') }}">

                                        @error('PrenomClient')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="AdresseClient">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div>
                                            <input type="email" class="form-control @error('AdresseClient') is-invalid @enderror" name="AdresseClient" id="AdresseClient" placeholder="Entrez un email valide" aria-describedby="inputGroupPrepend" minlength="5" maxlength="40" value="{{ old('AdresseClient') }}">
                                            
                                            @error('AdresseClient')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="TelephoneClient">Téléphone</label>
                                        <input type="text" class="form-control @error('TelephoneClient') is-invalid @enderror" name="TelephoneClient" id="TelephoneClient" placeholder="Numéro de Téléphone" pattern="^[\d\+\-\.\(\)\/\s]*$" minlength="8" maxlength="8" value="{{ old('TelephoneClient') }}">
                                        
                                            @error('TelephoneClient')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                   <div class="col-md-6 mb-3">
                                        <label for="NumeroCarte">Numero de Carte</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('NumeroCarte') is-invalid @enderror" name="NumeroCarte" id="NumeroCarte" placeholder="(XXX) XXX XXXX" aria-describedby="inputGroupPrepend" value="{{ old('NumeroCarte') }}" autocomplete="NumeroCarte">
                                            
                                            @error('NumeroCarte')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-md-6 mb-3 d-none">
                                        <label for="validationCustom03">Solde</label>
                                        <input type="text" class="form-control @error('Solde') is-invalid @enderror" name="Solde" id="validationCustom03" placeholder="Solde de la carte" value="0">
                                        
                                            @error('Solde')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                    </div>
                                    
                                </div>
                                {{-- <div class="form-group">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="invalidCheck" value="check" required>
                                        <label class="custom-control-label" for="invalidCheck">Agree to terms and conditions</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div> --}}
                                <button class="btn btn-primary" type="submit">Valider</button>
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
            <footer class="footer text-center">
                All Rights Reserved by Ample admin. Designed and Developed by <a href="https://wrappixel.com/">WrapPixel</a>.
            </footer>
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
        <script src="{{ asset('dist/js/custom.js')}}"></script>
        <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
        <script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
        <script src="{{ asset('assets/extra-libs/toastr/dist/build/toastr.min.js')}}"></script>
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

    <script>
        @if (Session::has('erreur'))
            toastr.error('{{ Session::get('erreur')}}') 
        @endif
    </script>
</body>

</html>