<?php

require_once(dirname(__FILE__,2).'/modeles/Modele.php');
class Controleur {
     use Modele; 

    public function afficherMissions()
    {
        $universs = new Universs($this->pdo);
        $universs = $universs->lister();
        $pdo = $this->pdo;
        require_once('vues/liste-univers.php');
    }

    public function connexion() {
        require_once('vues/page-connexion.php');
    }

    public function deconnexion() {
        // Procédure de deconnexion
        $_SESSION['admin'] = 0;
        $_SESSION['role'] = 0;
        $_SESSION['partenaire'] = -1;
        $_SESSION['datepartenaire'] = '';
        $_SESSION['nom'] = "";
        $_SESSION['prenom'] = "";
        $_SESSION['role-libelle'] = '';
        $_SESSION['userid'] = '';
        session_destroy();
        
        $this->accueil();
    }

    public function verifConnexion($mail,$password) {
        $admin = new Administrateurs($this->pdo);
        $messageConnexion = "";
        //if($admin->verifConnexion($mail,$password)) {
            if($admin->verifConnexion($mail,$password) > 0) {
            $_SESSION['admin'] = 1;
            $this->pageConnected();
        } else {
            session_destroy();
            $messageConnexionError = "Identifiant ou mot de passe erroné(s).";
            require_once('vues/page-connect.php');
            
        }
    }

    // ACCUEIL

    public function accueil($backToUnivers = 0)
    {
/*         $universs = new Universs($this->pdo);
        $universs = $universs->lister(); */
/*         $partenaires = new Partenaires($this->pdo);
        $partenaires = $partenaires->lister();
 */        /* $dates = new MyDates($this->pdo);
        $dates = $dates->listerDate(); */
        $backToUnivers = $backToUnivers;
        require_once('vues/page-accueil.php');
    }
    
    public function pageConnected() {
        require_once('vues/connected/page-connected.php');
    }

    public function updatePassword($id,$pass)
    {
        $administrateurs = new Administrateurs($this->pdo);
        $administrateurToUpdate = $administrateurs->updatePassword($id,$pass);
        require_once('vues/connected/page-connected.php');
        //$this->accueil('', $administrateurToUpdate);
    }


}