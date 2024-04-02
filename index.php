<?php
session_start();

require_once('modeles/ConnectMe.php');
require_once('controleurs/controleur.php');
require_once('modeles/Modele.php');
require_once('modeles/Administrateur.php');
require_once('modeles/Administrateurs.php');

$controleur = new Controleur($pdo);

// PROCEDURE Connexion et Déconnexion
if(isset($_POST['action']) && 'connexion' === $_POST['action']) {
    ob_start();
    $controleur->verifConnexion($_POST['connect-email'], $_POST['connect-passw']);
    //$controleur->updateToken($_SESSION['userid'], $_SESSION['token']);
    $contenu = ob_get_clean();
    require_once('vues/layout.php');
}  

elseif (isset($_GET['page']) && 'deconnexion' === $_GET['page']) {
    ob_start();
    $controleur->deconnexion();
    $contenu = ob_get_clean();
    require_once('vues/layout.php');
}

// PASSWORD UPDATE
if(isset($_POST['action']) && 'passwordUpdate' === $_POST['action']  && isset($_SESSION['userid']) && $_SESSION['userid'] > 0) {
    ob_start();
    $controleur->updatePassword($_POST['userid'],$_POST['password-passw']);
    $contenu = ob_get_clean();
    require_once('vues/layout.php');
}  



// CONNECT
elseif (isset($_GET['page']) && 'connect' === $_GET['page']) {
    ob_start();
    require_once('vues/page-connect.php');
    $contenu = ob_get_clean();
    require_once('vues/layout.php');

}

// CONNECTED (TABLEAU DE BORD)
elseif (isset($_GET['page']) && 'dashboard' === $_GET['page'] && isset($_SESSION['userid']) && $_SESSION['userid'] > 0) {
    ob_start();
    $controleur->pageConnected();
    //require_once('vues/connected/page-connected.php');
    $contenu = ob_get_clean();
    require_once('vues/layout.php');

}

// CGU
elseif (isset($_GET['page']) && 'cgu' === $_GET['page']) {
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
    
    $contenu = ob_get_clean();
    require_once('vues/layout.php');
    //$contenu = ob_get_clean();
    //require_once('vues/layout.php');
}

