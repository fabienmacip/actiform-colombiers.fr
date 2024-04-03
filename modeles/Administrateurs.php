<?php

class Administrateurs
{
    use Modele;

    // READ
    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM actiform_administrateur');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Administrateur',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }

    public function listerPartenaires()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM actiform_administrateur WHERE partenaire <> 0');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Administrateur',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }

    public function listerClients()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM actiform_administrateur WHERE isadmin = 2 ORDER BY prenom, nom');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Administrateur',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }


    public function listerId($id)
    {
        $id = intval($id);
        if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->query('SELECT * FROM administrateur WHERE id = :id');
            $sql = 'SELECT * FROM actiform_administrateur WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Administrateur',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }

    public function searchClients($search = '')
    {
        if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->query('SELECT * FROM administrateur WHERE id = :id');
            $sql = 'SELECT * FROM actiform_administrateur WHERE isadmin = 2 AND (prenom LIKE \'%'.$search.'%\' OR nom LIKE \'%'.$search.'%\' OR mail LIKE \'%'.$search.'%\')';
            $stmt = $this->pdo->prepare($sql);
            //$stmt->execute(['search' => $search]);
            $stmt->execute();
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Administrateur',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }



    // CREATE
    public function create($nom, $prenom, $mail, $mot_de_passe, $isadmin = 2) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $today = date("Y-m-d");
                $pass = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                $token = '';
                $sql = "INSERT INTO actiform_administrateur (nom, prenom, mail, date_creation, mot_de_passe, token, isadmin) VALUES (:nom, :prenom, :mail, :date_creation, :mot_de_passe, :token, :isadmin)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":nom"=>$nom, ":prenom"=>$prenom, ":mail"=>$mail, ":date_creation"=>$today, "mot_de_passe"=>$pass, "token"=>$token, "isadmin"=>$isadmin));
                if($exec){
                    $lastid = $this->pdo->lastInsertId();
                    $tupleCreated = $lastid ?? true;
                }
            }
            catch(Exception $e) {
                echo($e);
                $tupleCreated = false;
            }
        }
        $res->closeCursor();
        return $tupleCreated;
    }

    // UPDATE
    public function update($id,$nom, $prenom, $mail, $mot_de_passe = '') {
        if (!is_null($this->pdo)) {
            try {
                // Si le mot de passe a été modifié (donc non vide)
                if($mot_de_passe != '') {
                    $pass = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                    // Requête mysql pour insérer des données
                    $sql = "UPDATE actiform_administrateur SET nom = (:nom), prenom = (:prenom), mail = (:mail), mot_de_passe = (:mot_de_passe) WHERE id = (:id)";
                    $res = $this->pdo->prepare($sql);
                    $exec = $res->execute(array(":nom"=>$nom, ":prenom"=>$prenom, ":mail"=>$mail, "mot_de_passe"=>$pass, ":id"=>$id));
                } else { // Sinon, on met tout à jour sauf le mot de passe
                    $sql = "UPDATE actiform_administrateur SET nom = (:nom), prenom = (:prenom), mail = (:mail) WHERE id = (:id)";
                    $res = $this->pdo->prepare($sql);
                    $exec = $res->execute(array(":nom"=>$nom, ":prenom"=>$prenom, ":mail"=>$mail, ":id"=>$id));
                }
                if($exec){
                    $tupleUpdated = true;
                }
            }
            catch(Exception $e) {
                echo($e);
                $tupleUpdated = false;
            }
        }
        
        return $tupleUpdated;
    }

    // UPDATE-TOKEN-ONLY
    public function updateToken($id,$token) {
        if (!is_null($this->pdo)) {
            try {
                    
                    $sql = "UPDATE actiform_administrateur SET token = (:token) WHERE id = (:id)";
                    $res = $this->pdo->prepare($sql);
                    $exec = $res->execute(array(":token"=>$token, ":id"=>$id));
                if($exec){
                    $tupleUpdated = true;
                }
            }
            catch(Exception $e) {
                $tupleUpdated = false;
            }
        }
        
        return $tupleUpdated;
    }

    function getTokenFormUserId($id){
        $id = intval($id);
        if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->query('SELECT * FROM administrateur WHERE id = :id');
            $sql = 'SELECT token FROM actiform_administrateur WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Administrateur',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        echo "LISTE : ".$liste[0]." : FIN LISTE";
        return $liste[0];

    }

    function checkTokenExists($token){
        
        if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->query('SELECT * FROM administrateur WHERE id = :id');
            $sql = 'SELECT token FROM actiform_administrateur WHERE token = :token AND isadmin = 1';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['token' => $token]);
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Administrateur',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        
        return is_array($liste) && count($liste) > 0 && strlen($liste[0]->getToken() > 5);

    }

    function getRoleFromToken($token){
        if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->query('SELECT * FROM administrateur WHERE id = :id');
            $sql = 'SELECT isadmin FROM actiform_administrateur WHERE token = :token';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['token' => $token]);
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Administrateur',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        
        if(is_array($liste) && count($liste) > 0) {
            return $liste[0]->getIsAdmin();
        } else {
            return false;
        }

    }


    // UPDATE PASSWORD
    public function updatePassword($id, $mot_de_passe) {
        if (!is_null($this->pdo)) {
            try {
                // Si le mot de passe a été modifié (donc non vide)
                if($mot_de_passe != '') {
                    $pass = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                    // Requête mysql pour insérer des données
                    $sql = "UPDATE actiform_administrateur SET mot_de_passe = (:mot_de_passe) WHERE id = (:id)";
                    $res = $this->pdo->prepare($sql);
                    $exec = $res->execute(array("mot_de_passe"=>$pass, ":id"=>$id));
                }
                if($exec){
                    $tupleUpdated = "Votre mot de passe a bien été modifié.";
                }
            }
            catch(Exception $e) {
                $tupleUpdated = "Votre mot de passe n'a pas pu être modifié.<br/><br/>".$e;
            }
        }
        
        return $tupleUpdated;
    }

    

    // DELETE
    //Supprime 1 administrateur de la BDD.
    public function delete($id, $nom, $prenom)
    {
        if (!is_null($this->pdo)) {
            try{
                $sql = 'DELETE FROM actiform_administrateur WHERE id = :id';
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['id' => $id]);
                //$this->pdo->query('DELETE FROM administrateur WHERE id = '.$id.'');
                $tupleDeleted = "L'administrateur <b>".$nom." ".$prenom."</b> a bien été supprimé.";
            }
            catch(Exception $e) {
                $tupleDeleted = "L'administrateur <b>".$nom." ".$prenom."</b> n'a pas pu être supprimé.<br/><br/>".$e;
            }
        }
        
        return $tupleDeleted;
    }

    //Supprime 1 administrateur de la BDD.
    public function deleteWithIdOnly($id)
    {
        if (!is_null($this->pdo)) {
            try{
                $sql = 'DELETE FROM actiform_administrateur WHERE id = :id';
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['id' => $id]);
                //$this->pdo->query('DELETE FROM administrateur WHERE id = '.$id.'');
                $tupleDeleted = true;
            }
            catch(Exception $e) {
                $tupleDeleted = false;
            }
        }
        
        return $tupleDeleted;
    }

    // Vérifier si un login et un mot de passe matchent avec un administrateur
    public function verifConnexion($mail,$password) 
    {
        if (!is_null($this->pdo)) {
            $sql = 'SELECT * FROM actiform_administrateur WHERE mail = :mail';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['mail' => $mail]);
        }
        $reponse = $stmt->fetchObject('Administrateur',[$this->pdo]);
        
        //return ($reponse && password_verify($password, $reponse->getMotDePasse()));
        if(($reponse && password_verify($password, $reponse->getMotDePasse()))){
            unset($_SESSION['token']);
            if(!isset($_SESSION['token'])) {
                $_SESSION['token'] = md5(time()*rand(1,666));
            }

            //$_SESSION['partenaire'] = $reponse->getPartenaire();
            $_SESSION['datepartenaire'] = $reponse->getDateCreation();
            $_SESSION['role'] = $reponse->getRole();
            $_SESSION['userid'] = $reponse->getId();
            if($reponse->getRole() == 1) {
                $_SESSION['role-libelle'] = 'Administrateur';
            }
            else {
                $_SESSION['role-libelle'] = 'Client';
            }
            $_SESSION['nom'] = $reponse->getNom();
            $_SESSION['prenom'] = $reponse->getPrenom();
            return $reponse->getId();
        }
        
    }
}




// Anciennement dans VerifConnexion
//$stmt = $this->pdo->query('SELECT * FROM administrateur WHERE mail = \''.$mail.'\'');