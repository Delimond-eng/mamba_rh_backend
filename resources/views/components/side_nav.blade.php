<div class="sidebar" id="sidebar">
	<!-- Logo -->
    <div class="sidebar-logo">
        <a href="/" class="logo logo-normal">
            <img src="assets/img/logo.svg" alt="Logo">
        </a>
        <a href="/" class="logo-small">
            <img src="assets/img/logo-small.svg" alt="Logo">
        </a>
        <a href="/" class="dark-logo">
            <img src="assets/img/logo-white.svg" alt="Logo">
        </a>
    </div>
    <!-- /Logo -->

    <div class="modern-profile p-3 pb-0">
        <div class="text-center rounded bg-light p-3 mb-4 user-profile">
            <div class="avatar avatar-lg online mb-3">
                <img src="assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
            </div>
            <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
            <p class="fs-10">System Admin</p>
        </div>
        <div class="sidebar-nav mb-3">
            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent"
                role="tablist">
                <li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="chat.html">Chats</a></li>
                <li class="nav-item"><a class="nav-link border-0" href="email.html">Inbox</a></li>
            </ul>
        </div>
    </div>

    <div class="sidebar-header p-3 pb-0 pt-2">
        <div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
            <div class="avatar avatar-md onlin">
                <img src="assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
            </div>
            <div class="text-start sidebar-profile-info ms-2">
                <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
                <p class="fs-10">System Admin</p>
            </div>
        </div>
        <div class="input-group input-group-flat d-inline-flex mb-4">
            <span class="input-icon-addon">
                <i class="ti ti-search"></i>
            </span>
            <input type="text" class="form-control" placeholder="Search in HRMS">
            <span class="input-group-text">
                <kbd>CTRL + / </kbd>
            </span>
        </div>
        <div class="d-flex align-items-center justify-content-between menu-item mb-3">
            <div class="me-3">
                <a href="calendar.html" class="btn btn-menubar">
                    <i class="ti ti-layout-grid-remove"></i>
                </a>
            </div>
            <div class="me-3">
                <a href="chat.html" class="btn btn-menubar position-relative">
                    <i class="ti ti-brand-hipchat"></i>
                    <span
                        class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
                </a>
            </div>
            <div class="me-3 notification-item">
                <a href="activity.html" class="btn btn-menubar position-relative me-1">
                    <i class="ti ti-bell"></i>
                    <span class="notification-status-dot"></span>
                </a>
            </div>
            <div class="me-0">
                <a href="email.html" class="btn btn-menubar">
                    <i class="ti ti-message"></i>
                </a>
            </div>
        </div>
    </div>


    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

                {{-- ================= MAIN MENU ================= --}}
                @canany(['dashboard_admin.view', 'dashboard_rh.view', 'dashboard_agent.view'])
                <li class="menu-title mt-3"><span>MAIN MENU</span></li>

                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="@active(['dashboard'])">
                                <i class="ti ti-smart-home"></i><span>Dashboard</span>
                                <span class="badge badge-danger fs-10 fw-medium text-white p-1">Hot</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @can('dashboard_admin.view')
                                <li><a href="/" class="@active(['dashboard'])">Dashboard Admin</a></li>
                                @endcan
                                @can('dashboard_rh.view')
                                <li><a href="#">Dashboard RH</a></li>
                                @endcan
                                @can('dashboard_agent.view')
                                <li><a href="#">Dashboard Agent</a></li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </li>
                @endcanany

                {{-- ================= RESSOURCES HUMAINES ================= --}}
                @canany([
                    'agents.create','agents.view','services.view','baremes.view',
                    'horaires.view','groupes.view','plannings.view','retards.view','absences.view',
                    'sanctions.view','conges.view','heures.view','autorisations.view','paie_parametres.view',
                    'separations.view','desertions.view'
                ])
                <li class="menu-title mt-3"><span>RESSOURCES HUMAINES</span></li>

                <li>
                    <ul>
                        @canany(['agents.create', 'agents.view', 'services.view', 'baremes.view'])
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-id-badge"></i><span>Personnel</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @can('agents.create')
                                <li><a href="{{ url('/agents') }}">Création Agents</a></li>
                                @endcan
                                @can('agents.view')
                                <li><a href="{{ url('/liste_agents') }}">Liste Agents</a></li>
                                @endcan
                                @can('services.view')
                                <li><a href="{{ url('/services') }}">Services</a></li>
                                @endcan
                                @can('baremes.view')
                                <li><a href="{{ url('/baremes') }}">Barèmes & Grades</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        @canany(['horaires.view','groupes.view','plannings.view','retards.view','absences.view'])
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-clock"></i>
                                <span>Temps & Présences</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @can('horaires.view')
                                <li><a href="{{ url('/horaires') }}">Horaires</a></li>
                                @endcan
                                @can('groupes.view')
                                <li><a href="{{ url('/groupes') }}">Groupes</a></li>
                                @endcan
                                @can('plannings.view')
                                <li><a href="{{ url('/plannings') }}">Plannings rotatifs</a></li>
                                @endcan
                                @can('retards.view')
                                <li><a href="{{ url('/retards') }}">Retards</a></li>
                                @endcan
                                @can('absences.view')
                                <li><a href="{{ url('/absences') }}">Absences</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        @can('sanctions.view')
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-gavel"></i>
                                <span>Discipline & Sanctions</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="{{ url('/sanctions') }}">Sanctions disciplinaires</a></li>
                            </ul>
                        </li>
                        @endcan

                        @canany(['conges.view','heures.view','autorisations.view','paie_parametres.view'])
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-briefcase"></i>
                                <span>Congés & Autorisations</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @can('conges.view')
                                <li><a href="{{ url('/conges') }}">Congés</a></li>
                                @endcan
                                @can('heures.view')
                                <li><a href="{{ url('/heures') }}">Heures supplémentaires</a></li>
                                @endcan
                                @can('autorisations.view')
                                <li><a href="{{ url('/autorisations') }}">Autorisations spéciales</a></li>
                                @endcan
                                @can('paie_parametres.view')
                                <li><a href="{{ url('/parametres/formules') }}">Paramètres</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        @canany(['separations.view','desertions.view'])
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-alert-triangle"></i>
                                <span>Incidents RH</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @can('separations.view')
                                <li><a href="{{ url('/separations') }}">Séparations</a></li>
                                @endcan
                                @can('desertions.view')
                                <li><a href="{{ url('/desertions') }}">Désertions</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany
                    </ul>
                </li>
                @endcanany

                {{-- ================= OPERATIONS ================= --}}
                @canany(['mouvements.create','historiques_mouvements.view','sites.view','affectations.view','appels_non_repondu.create','appels_stats.view','vehicules.view','vehicule_rapports.view','absences.view','retards.view'])
                <li class="menu-title mt-3"><span>OPÉRATIONS</span></li>

                <li>
                    <ul>
                        @canany(['mouvements.create','historiques_mouvements.view'])
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-transfer"></i>
                                <span>Mouvements</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @can('mouvements.create')
                                <li><a href="{{ url('/mouvements') }}">Nouveau mouvement</a></li>
                                @endcan
                                @can('historiques_mouvements.view')
                                <li><a href="{{ url('/historiques.mouvements') }}">Historique des mouvements</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        @canany(['sites.view','affectations.view'])
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-building"></i>
                                <span>Sites </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @can('sites.view')
                                <li><a href="{{ url('/sites') }}">Sites</a></li>
                                @endcan
                                @can('affectations.view')
                                <li><a href="{{ url('/affectations') }}">Affectations</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        @canany(['appels_non_repondu.create','appels_stats.view'])
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-phone"></i>
                                <span>Appels non répondus</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @can('appels_non_repondu.create')
                                <li><a href="{{ url('/appels-non-repondu') }}">Saisies journalières</a></li>
                                @endcan
                                @can('appels_stats.view')
                                <li><a href="{{ url('/appels_stats') }}">Statistiques</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        @canany(['vehicules.view','vehicule_rapports.view'])
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-truck"></i>
                                <span>Flotte de véhicules</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @can('vehicules.view')
                                <li><a href="{{ url('/vehicules') }}">Véhicules</a></li>
                                @endcan
                                @can('vehicule_rapports.view')
                                <li><a href="{{ url('/vehicule-rapports') }}">Rapports véhicule</a></li>
                                @endcan
                                @can('vehicules.view')
                                <li><a href="rapports-autres.html">Autres rapports</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        @canany(['absences.view','retards.view'])
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-clock"></i>
                                <span>Présences</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @can('absences.view')
                                <li><a href="{{ url('/absences') }}">Absences</a></li>
                                @endcan
                                @can('retards.view')
                                <li><a href="{{ url('/retards') }}">Retards</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany
                    </ul>
                </li>
                @endcanany

                {{-- ================= PAIE ================= --}}
                @canany([
                    'paie_baremes.view','paie_parametres.view','paie_calcul.create','paie_bulletins.view',
                    'paie_avances.create','paie_decomptes.view','paie_cnss.view'
                ])
                <li class="menu-title mt-3"><span>PAIE</span></li>
                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-cash"></i>
                                <span>Gestion de la paie</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @can('paie_baremes.view')
                                <li><a href="paie-baremes.html">Barèmes & primes</a></li>
                                @endcan
                                @can('paie_parametres.view')
                                <li><a href="paie-parametres.html">Paramètres de paie</a></li>
                                @endcan
                                @can('paie_calcul.create')
                                <li><a href="paie-calcul.html">Calcul de la paie</a></li>
                                @endcan
                                @can('paie_bulletins.view')
                                <li><a href="paie-bulletins.html">Bulletins de paie</a></li>
                                @endcan
                                @can('paie_avances.create')
                                <li><a href="paie-avances.html">Avances & retenues</a></li>
                                @endcan
                                @can('paie_decomptes.view')
                                <li><a href="paie-decomptes.html">Décomptes finaux</a></li>
                                @endcan
                                @can('paie_cnss.view')
                                <li><a href="paie-cnss.html">CNSS / INPP / ONEM</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        {{-- ================= RAPPORTS ================= --}}
                        @canany([
                            'rapport_presences.view','rapport_conges.view','rapport_retards.view','rapport_heures_supp.view','rapport_paie.view'
                        ])
                        <li class="menu-title mt-3"><span>RAPPORTS</span></li>

                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-file-analytics"></i>
                                <span>Rapports</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @can('rapport_presences.view')
                                <li><a href="rapport-presences.html">Présences</a></li>
                                @endcan
                                @can('rapport_conges.view')
                                <li><a href="rapport-conges.html">Congés</a></li>
                                @endcan
                                @can('rapport_retards.view')
                                <li><a href="rapport-retards.html">Retards</a></li>
                                @endcan
                                @can('rapport_heures_supp.view')
                                <li><a href="rapport-heures-supp.html">Heures supplémentaires</a></li>
                                @endcan
                                @can('rapport_paie.view')
                                <li><a href="rapport-paie.html">Paie</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        {{-- ================= ADMINISTRATION ================= --}}
                        @canany(['users.view','roles.view','audit.view','backups.view','paie_parametres.view'])
                        <li class="menu-title mt-3"><span>ADMINISTRATION</span></li>

                        <li class="submenu">
                            <a href="javascript:void(0);" class="@active(['roles', 'users'])">
                                <i class="ti ti-settings"></i>
                                <span>Système</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @can('users.view')
                                <li><a class="@active(['users'])" href="{{ route("users") }}">Utilisateurs</a></li>
                                @endcan
                                @can('roles.view')
                                <li><a class="@active(['roles'])" href="{{ route("roles") }}">Rôles & permissions</a></li>
                                @endcan
                                @can('audit.view')
                                <li><a href="audit.html">Journal d'audit</a></li>
                                @endcan
                                @can('backups.view')
                                <li><a href="backups.html">Sauvegardes</a></li>
                                @endcan
                                @can('paie_parametres.view')
                                <li><a href="parametres.html">Paramètres système</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>