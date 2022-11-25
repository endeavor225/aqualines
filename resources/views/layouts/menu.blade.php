<aside class="left-sidebar" >
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('home')}}" aria-expanded="false">
                        <i class="mdi mdi-av-timer text-success"></i>
                        <span class="hide-menu">Tableau de bord</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">Clients</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{route ('clients.create')}}" class="sidebar-link">
                                <i class="mdi mdi-cards-variant"></i>
                                <span class="hide-menu">Nouveau client</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route ('clients.index')}}" class="sidebar-link">
                                <i class="mdi mdi-cart"></i>
                                <span class="hide-menu">Listes des clients</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Cartes</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{route ('cartes.create')}}" class="sidebar-link">
                                <i class="mdi mdi-cards-variant"></i>
                                <span class="hide-menu">Nouveau Cartes</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route ('cartes.index')}}" class="sidebar-link">
                                <i class="mdi mdi-cart"></i>
                                <span class="hide-menu">Listes des Cartes</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('cartes.index')}}" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">Cartes</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route ('gares.index')}}" aria-expanded="false">
                        <i class="mdi mdi-black-mesa"></i>
                        <span class="hide-menu">Gares</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('transactions.index')}}" aria-expanded="false">
                        <i class="mdi mdi-receipt"></i>
                        <span class="hide-menu">Transactions</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-ferry"></i>
                        <span class="hide-menu">Bateaux</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{route ('bateaus.create')}}" class="sidebar-link">
                                <i class="mdi mdi-cards-variant"></i>
                                <span class="hide-menu">Nouveau bateau</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route ('bateaus.index')}}" class="sidebar-link">
                                <i class="mdi mdi-cart"></i>
                                <span class="hide-menu">Listes des bateaux</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route ('caisses.index')}}" aria-expanded="false">
                            <i class="mdi  mdi-package-down"></i>
                            <span class="hide-menu">Caisse</span>
                        </a>
                    </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-motorbike"></i>
                        <span class="hide-menu">Voyages</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{route ('voyages.create')}}" class="sidebar-link">
                                <i class="mdi mdi-cards-variant"></i>
                                <span class="hide-menu">Nouveau voyage</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route ('voyages.index')}}" class="sidebar-link">
                                <i class="mdi mdi-cart"></i>
                                <span class="hide-menu">Listes des voyages</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi  mdi-plus"></i>
                        <span class="hide-menu">Recharges</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{route ('recharges.create')}}" class="sidebar-link">
                                <i class="mdi mdi-cards-variant"></i>
                                <span class="hide-menu">Rechargement</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route ('recharges.index')}}" class="sidebar-link">
                                <i class="mdi mdi-cart"></i>
                                <span class="hide-menu">Situation des rechargements</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route ('terminals.index')}}" aria-expanded="false">
                        <i class="mdi mdi-camera-rear"></i>
                        <span class="hide-menu">Validateur</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route ('bonus.index')}}" aria-expanded="false">
                        <i class="mdi mdi-airballoon"></i>
                        <span class="hide-menu">Bonus</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route ('sms.index')}}" aria-expanded="false">
                        <i class="mdi mdi-message-text"></i>
                        <span class="hide-menu">Message</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route ('utilisateurs.index')}}" aria-expanded="false">
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">Utilisateurs</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/geolocalication" aria-expanded="false">
                        <i class="mdi mdi-google-maps"></i>
                        <span class="hide-menu">Géolocalisation</span>
                    </a>
                </li> --}}
                {{-- <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route ('fonctions.index')}}" aria-expanded="false">
                            <i class="mdi mdi-account-key"></i>
                            <span class="hide-menu">Fonctions</span>
                        </a>
                    </li>
                
                <div class="devider"></div>
                
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="mdi mdi-adjust text-danger"></i>
                        <span class="hide-menu">Documentation</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="mdi mdi-adjust text-info"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                        <i class="mdi mdi-adjust text-success"></i>
                        <span class="hide-menu">FAQs</span>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>