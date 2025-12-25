<?php

return [

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    'dashboard_admin' => [
        'entity' => 'dashboard_admin',
        'label'  => 'Dashboard Admin',
        'actions' => ['view']
    ],

    'dashboard_rh' => [
        'entity' => 'dashboard_rh',
        'label'  => 'Dashboard RH',
        'actions' => ['view']
    ],

    'dashboard_agent' => [
        'entity' => 'dashboard_agent',
        'label'  => 'Dashboard Agent',
        'actions' => ['view']
    ],

    /*
    |--------------------------------------------------------------------------
    | RESSOURCES HUMAINES
    |--------------------------------------------------------------------------
    */

    'agents' => [
        'entity' => 'agents',
        'label'  => 'Agents',
        'actions' => ['view','create','update','delete','export','import']
    ],

    'services' => [
        'entity' => 'services',
        'label'  => 'Services',
        'actions' => ['view','create','update','delete']
    ],

    'baremes' => [
        'entity' => 'baremes',
        'label'  => 'Barèmes & Grades',
        'actions' => ['view','create','update']
    ],

    'horaires' => [
        'entity' => 'horaires',
        'label'  => 'Horaires',
        'actions' => ['view','create','update']
    ],

    'groupes' => [
        'entity' => 'groupes',
        'label'  => 'Groupes',
        'actions' => ['view','create','update']
    ],

    'plannings' => [
        'entity' => 'plannings',
        'label'  => 'Plannings rotatifs',
        'actions' => ['view','create','update']
    ],

    'retards' => [
        'entity' => 'retards',
        'label'  => 'Retards',
        'actions' => ['view','create','export']
    ],

    'absences' => [
        'entity' => 'absences',
        'label'  => 'Absences',
        'actions' => ['view','create','update','delete','export']
    ],

    'sanctions' => [
        'entity' => 'sanctions',
        'label'  => 'Sanctions disciplinaires',
        'actions' => ['view','create','update','delete']
    ],

    'conges' => [
        'entity' => 'conges',
        'label'  => 'Congés',
        'actions' => ['view','create','update','delete','export']
    ],

    'heures' => [
        'entity' => 'heures',
        'label'  => 'Heures supplémentaires',
        'actions' => ['view','create','export']
    ],

    'autorisations' => [
        'entity' => 'autorisations',
        'label'  => 'Autorisations spéciales',
        'actions' => ['view','create']
    ],

    'separations' => [
        'entity' => 'separations',
        'label'  => 'Séparations',
        'actions' => ['view','create']
    ],

    'desertions' => [
        'entity' => 'desertions',
        'label'  => 'Désertions',
        'actions' => ['view','create']
    ],

    /*
    |--------------------------------------------------------------------------
    | OPÉRATIONS
    |--------------------------------------------------------------------------
    */

    'mouvements' => [
        'entity' => 'mouvements',
        'label'  => 'Mouvements',
        'actions' => ['view','create','export']
    ],

    'historiques_mouvements' => [
        'entity' => 'historiques_mouvements',
        'label'  => 'Historique des mouvements',
        'actions' => ['view','export']
    ],

    'sites' => [
        'entity' => 'sites',
        'label'  => 'Sites',
        'actions' => ['view','create','update','delete']
    ],

    'affectations' => [
        'entity' => 'affectations',
        'label'  => 'Affectations',
        'actions' => ['view','create']
    ],

    'appels_non_repondu' => [
        'entity' => 'appels_non_repondu',
        'label'  => 'Appels non répondus',
        'actions' => ['view','create','export']
    ],

    'appels_stats' => [
        'entity' => 'appels_stats',
        'label'  => 'Statistiques appels',
        'actions' => ['view','export']
    ],

    'vehicules' => [
        'entity' => 'vehicules',
        'label'  => 'Flotte de véhicules',
        'actions' => ['view','create','update','delete','export']
    ],

    'vehicule_rapports' => [
        'entity' => 'vehicule_rapports',
        'label'  => 'Rapports véhicules',
        'actions' => ['view','export']
    ],

    /*
    |--------------------------------------------------------------------------
    | PAIE
    |--------------------------------------------------------------------------
    */

    'paie_baremes' => [
        'entity' => 'paie_baremes',
        'label'  => 'Barèmes & primes',
        'actions' => ['view','create','update']
    ],

    'paie_parametres' => [
        'entity' => 'paie_parametres',
        'label'  => 'Paramètres de paie',
        'actions' => ['view','update']
    ],

    'paie_calcul' => [
        'entity' => 'paie_calcul',
        'label'  => 'Calcul de la paie',
        'actions' => ['view','create']
    ],

    'paie_bulletins' => [
        'entity' => 'paie_bulletins',
        'label'  => 'Bulletins de paie',
        'actions' => ['view','export']
    ],

    'paie_avances' => [
        'entity' => 'paie_avances',
        'label'  => 'Avances & retenues',
        'actions' => ['view','create']
    ],

    'paie_decomptes' => [
        'entity' => 'paie_decomptes',
        'label'  => 'Décomptes finaux',
        'actions' => ['view','export']
    ],

    'paie_cnss' => [
        'entity' => 'paie_cnss',
        'label'  => 'CNSS / INPP / ONEM',
        'actions' => ['view','export']
    ],

    /*
    |--------------------------------------------------------------------------
    | RAPPORTS
    |--------------------------------------------------------------------------
    */

    'rapport_presences' => [
        'entity' => 'rapport_presences',
        'label'  => 'Rapports Présences',
        'actions' => ['view','export']
    ],

    'rapport_conges' => [
        'entity' => 'rapport_conges',
        'label'  => 'Rapports Congés',
        'actions' => ['view','export']
    ],

    'rapport_retards' => [
        'entity' => 'rapport_retards',
        'label'  => 'Rapports Retards',
        'actions' => ['view','export']
    ],

    'rapport_heures_supp' => [
        'entity' => 'rapport_heures_supp',
        'label'  => 'Rapports Heures supplémentaires',
        'actions' => ['view','export']
    ],

    'rapport_paie' => [
        'entity' => 'rapport_paie',
        'label'  => 'Rapports Paie',
        'actions' => ['view','export']
    ],

    /*
    |--------------------------------------------------------------------------
    | ADMINISTRATION
    |--------------------------------------------------------------------------
    */

    'users' => [
        'entity' => 'users',
        'label'  => 'Utilisateurs',
        'actions' => ['view','create','update','delete']
    ],

    'roles' => [
        'entity' => 'roles',
        'label'  => 'Rôles & permissions',
        'actions' => ['view','create','update','delete']
    ],

    'audit' => [
        'entity' => 'audit',
        'label'  => 'Journal d’audit',
        'actions' => ['view']
    ],

    'backups' => [
        'entity' => 'backups',
        'label'  => 'Sauvegardes',
        'actions' => ['view','create']
    ],

];
