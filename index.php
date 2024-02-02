<?php



// CGU
if (isset($_GET['page']) && 'cgu' === $_GET['page']) {
    ob_start();
    require_once('vues/page-cgu.php');
    $contenu = ob_get_clean();
    require_once('vues/layout.php');

}

// MENTIONS LEGALES
elseif (isset($_GET['page']) && 'mentions-legales' === $_GET['page']) {
    ob_start();
    require_once('vues/page-mentions-legales.php');
    $contenu = ob_get_clean();
    require_once('vues/layout.php');
}

// SEANCE DECOUVERTE
elseif (isset($_GET['page']) && 'seance-decouverte' === $_GET['page']) {
    ob_start();
    require_once('vues/page-seance-decouverte.php');
    $contenu = ob_get_clean();
    require_once('vues/layout.php');
}

// OFFRES & AVANTAGES
elseif (isset($_GET['page']) && 'offres-avantages' === $_GET['page']) {
    ob_start();
    require_once('vues/page-offres-avantages.php');
    $contenu = ob_get_clean();
    require_once('vues/layout.php');
}

// PLANNING & RESERVATIONS
elseif (isset($_GET['page']) && 'planning-reservations' === $_GET['page']) {
    ob_start();
    require_once('vues/page-planning-reservations.php');
    $contenu = ob_get_clean();
    require_once('vues/layout.php');
}

// TEMOIGNAGES
elseif (isset($_GET['page']) && 'temoignages' === $_GET['page']) {
    ob_start();
    require_once('vues/page-temoignages.php');
    $contenu = ob_get_clean();
    require_once('vues/layout.php');
}

// CONTACT & HORAIRES
elseif (isset($_GET['page']) && 'contact-horaires' === $_GET['page']) {
    ob_start();
    require_once('vues/page-contact-horaires.php');
    $contenu = ob_get_clean();
    require_once('vues/layout.php');
}

/* PARTENAIRE (LABELS) */

elseif (isset($_GET['page']) && 'partenaires' === $_GET['page']){
    ob_start();
    require_once('vues/page-partenaires.php');
    $contenu = ob_get_clean();
    require_once('vues/layout.php');
}

else {
    ob_start();
    require_once('vues/page-accueil.php');
    //$contenu = ob_get_clean();
    //require_once('vues/layout.php');
}

