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
                        <h5 class="font-medium text-uppercase mb-0">Voyages</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="{{ route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Voyages</li>
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
                            <h4 class="card-title">Ajout de Voyage</h4><br>
                            <form class="" action="{{ route('voyages.store')}}" method="POST" novalidate>
                                @csrf
                                
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="CodeVoyage">Code du voyages</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control  @error('CodeVoyage') is-invalid @enderror" name="CodeVoyage" id="CodeVoyage" placeholder="Saissez le code du voyage" aria-describedby="inputGroupPrepend" value="{{ old('CodeVoyage') }}">
                                           
                                            @error('CodeVoyage')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="PassageInitial">Passagé initial</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('PassageInitial') is-invalid @enderror" name="PassageInitial" id="PassageInitial" placeholder="Saissez le nombre de passagé existant déjà" aria-describedby="inputGroupPrepend" value="{{ old('PassageInitial') }}" value="0">
                                            
                                            @error('PassageInitial')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="bateau_id">Bateau</label>
                                        <div class="input-group">
                                            <select name="bateau_id" id="bateau_id" class="form-control @error('bateau_id') is-invalid @enderror" aria-describedby="inputGroupPrepend">

                                                    @foreach ($bateaus as $bateau)

                                                       <option value="{{ $bateau->id }}">{{ $bateau->Matricule }}
                                                        </option>

                                                    @endforeach
                                                    
                                                </select>
                                                @error('bateau_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="MontantVoyage">Motant du voyage</label>
                                        <select type="text" class="form-control @error('MontantVoyage') is-invalid @enderror" name="MontantVoyage" id="MontantVoyage" placeholder="Tarif du voyage" value="{{ old('MontantVoyage') }}">

                                            <option value="500">500</option>
                                            <option value="400">400</option>
                                            <option value="300">300</option>
                                            <option value="200">200</option>
                                        </select>

                                        @error('MontantVoyage')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="Depart">Gare de depart</label>
                                            <div class="input-group">
                                                <select name="Depart" id="Depart" class="form-control @error('Depart') is-invalid @enderror" aria-describedby="inputGroupPrepend">
                                                    @foreach ($gares as $gare)
                                                        <option value="{{$gare->NomGare}}">{{$gare->NomGare}}</option>
                                                    @endforeach

                                                        {{-- <option value="">Choisissez le trajet</option>
                                                        <option value="Cocody-Blockoss">Cocody-Blockoss</option>
                                                        <option value="Plateau">Plateau</option>
                                                        <option value="Treichville">Treichville</option> --}}
                                                    </select>
                                                
                                                    @error('Depart')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                                <label for="Destination">Gare d'arivée</label>
                                                <div class="input-group">
                                                    <select name="Destination" id="Destination" class="form-control @error('Destination') is-invalid @enderror" aria-describedby="inputGroupPrepend">
                                                        @foreach ($gares as $gare)
                                                        <option value="{{$gare->NomGare}}">{{$gare->NomGare}}</option>
                                                        @endforeach
                                                            {{-- <option value="">Choisissez le trajet</option>
                                                            <option value="Cocody-Blockoss">Cocody-Blockoss</option>
                                                            <option value="Plateau">Plateau</option>
                                                            <option value="Treichville">Treichville</option> --}}
                                                        </select>
                                                    
                                                        @error('Destination')
                                                            <span class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3 d-none">
                                                <label for="Statut">Statut</label>
                                                <div class="input-group">
                                                    <select name="Statut" id="Statut" class="form-control @error('Statut') is-invalid @enderror" aria-describedby="inputGroupPrepend" required>
                                                            <option value="0">En cours</option>
                                                            <option value="1">Terminer</option>
                                                        </select>
                                                        @error('Statut')
                                                            <span class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="terminal1">Validateur 1</label>
                                                <div class="input-group">
                                                    <select name="terminal1" id="terminal1" class="form-control @error('terminal1') is-invalid @enderror" aria-describedby="inputGroupPrepend">

                                                        <option value="">Selectionnez le terminal</option>
                                                        @foreach ($terminals as $terminal)
                                                            <option value="{{ $terminal->id }}">{{ $terminal->Libelle }}
                                                            </option>
                                                        @endforeach
                                                            
                                                        </select>
                                                    
                                                        @error('terminal1')
                                                            <span class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="terminal2">Validateur 2</label>
                                                <div class="input-group">
                                                    <select name="terminal2" id="terminal2" class="form-control" aria-describedby="inputGroupPrepend" >
        
                                                        <option value="">Selectionnez le terminal</option>
                                                        @foreach ($terminals as $terminal)
                                                            <option value="{{ $terminal->id }}">{{ $terminal->Libelle }}
                                                            </option>
                                                        @endforeach
                                                            
                                                    </select>
                                                </div>
                                            </div>
                                        
                                    </div>

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