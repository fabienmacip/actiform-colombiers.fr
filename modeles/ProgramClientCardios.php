<?php

class ProgramClientCardios
{
    use Modele;

    // READ
    public function listerPourUnClient($clientId)
    {
        if (!is_null($this->pdo)) {
            $sql = 'SELECT * FROM actiform_program_client_cardio WHERE idclient = :idclient ORDER BY idcardio, numseance';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['idclient' => $clientId]);
        }
        $liste = [];
        while ($element = $stmt->fetchObject('ProgramClientCardio',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }

    // CREATE
    public function createAllEmpty($idClient) {
        if (!is_null($this->pdo)) {
            try {
                $sql = "INSERT INTO actiform_program_client_cardio (idclient, idcardio, numseance) 
                            VALUES (:idclient, 1, 1),(:idclient, 1, 2),(:idclient, 1, 3),(:idclient, 1, 4),
                                   (:idclient, 2, 1),(:idclient, 2, 2),(:idclient, 2, 3),(:idclient, 2, 4),
                                   (:idclient, 3, 1),(:idclient, 3, 2),(:idclient, 3, 3),(:idclient, 3, 4),
                                   (:idclient, 4, 1),(:idclient, 4, 2),(:idclient, 4, 3),(:idclient, 4, 4),
                                   (:idclient, 5, 1),(:idclient, 5, 2),(:idclient, 5, 3),(:idclient, 5, 4),
                                   (:idclient, 6, 1),(:idclient, 6, 2),(:idclient, 6, 3),(:idclient, 6, 4),
                                   (:idclient, 7, 1),(:idclient, 7, 2),(:idclient, 7, 3),(:idclient, 7, 4)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":idclient"=>$idClient));
                if($exec){
                    $tupleCreated = true;
                }
            }
            catch(Exception $e) {
                $tupleCreated = false;
            }
        }
        $res->closeCursor();
        return $tupleCreated;
    }



}