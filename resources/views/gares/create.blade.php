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
                        <h5 class="font-medium text-uppercase mb-0">Gares</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="{{ route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gares</li>
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
                            <h4 class="card-title">Formulaire d'inscription d'une nouvelle gare</h4><br>
                            <form class="" action="{{ route('gares.store')}}" method="POST" novalidate>
                                @csrf
                                

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="NomGare">Nom de la Gare :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('NomGare') is-invalid @enderror" name="NomGare" id="NomGare" placeholder="Gare" aria-describedby="inputGroupPrepend" value="{{ old('NomGare') }}" >
                                            
                                            @error('NomGare')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ResponsableGare">Nom du Responsable de la Gare :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('ResponsableGare') is-invalid @enderror" name="ResponsableGare" id="ResponsableGare" placeholder="Responsable de la Gare" aria-describedby="inputGroupPrepend" value="{{ old('ResponsableGare') }}">
                                            
                                            @error('ResponsableGare')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="NumeroGare">Numero de la Gare:</label>
                                        <input type="text" class="form-control @error('NumeroGare') is-invalid @enderror" name="NumeroGare" id="NumeroGare" placeholder="Nunmero de la gare" value="{{ old('NumeroGare') }}">
                                        
                                        @error('NumeroGare')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="AdresseGare">Email:</label>
                                        <input type="email" class="form-control @error('AdresseGare') is-invalid @enderror" name="AdresseGare" id="AdresseGare" placeholder="Email de la gare" value="{{ old('AdresseGare') }}">
                                        
                                        @error('AdresseGare')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="TelephoneGare">Téléphone</label>
                                        <input type="text" class="form-control @error('TelephoneGare') is-invalid @enderror" name="TelephoneGare" id="TelephoneGare" placeholder="Contact"  value="{{ old('TelephoneGare') }}" maxlength="8" minlength="8">
                                        
                                        @error('TelephoneGare')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                            <label for="gare_id">Couleur</label>
                                            <div class="input-group">
                                                <select name="Couleur" id="Couleur" class="form-control @error('Couleur') is-invalid @enderror" aria-describedby="inputGroupPrepend" >
    
                                                    <option value="">Choississez une couleur</option>
                                                    <option value="rbg(0, 0, 255)">Bleu</option>
                                                    <option value="rbg(119, 181, 254)">Bleu ciel</option>
                                                    <option value="rbg(96, 96, 96)">Gris</option>
                                                    <option value="rbg(255, 228, 0)">Jaune</option>
                                                    <option value="rbg(88, 41, 0)">Marron</option>
                                                    <option value="rbg(255, 120, 0)">Orange</option>
                                                    <option value="rbg(255, 0, 0)">Rouge</option>
                                                    <option value="rbg(253, 108, 158)">Rose</option>   
                                                    <option value="rbg(0, 255, 0)">Vert</option>
                                                    <option value="rbg(102, 0, 153)">Violet</option>
                                                </select>
    
                                                @error('Couleur')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                                
                                            </div>
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
        <script src="{{ asset('dist/js/custom.js')}}"></script>
        <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
        <script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
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
</body>

</html>