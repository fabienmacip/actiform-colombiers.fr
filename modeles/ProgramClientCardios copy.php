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

    function updateClientCardio($array){
        
        $id1 = intval($array['id-client-cardio-first']);
        $id2 = $id1 + 1;
        $id3 = $id2 + 1;
        $id4 = $id3 + 1;
        

        $tupleUpdated = true;

        if (!is_null($this->pdo)) {
            try {
                    $sql1 = "UPDATE actiform_program_client_cardio SET temps = (:temps), niveau = (:niveau), resistance = (:resistance) WHERE id = (:id)";
                    $res1 = $this->pdo->prepare($sql1);
                    $exec1 = $res1->execute(array(":temps"=>$array['cardio-temps-1'], ":niveau"=>$array['cardio-niveau-1'], ":resistance"=>$array['cardio-resistance-1'], ":id"=>$id1));
                
                if($exec1){
                    try{
                        $sql2 = "UPDATE actiform_program_client_cardio SET temps = (:temps), niveau = (:niveau), resistance = (:resistance) WHERE id = (:id)";
                        $res2 = $this->pdo->prepare($sql2);
                        $exec2 = $res2->execute(array(":temps"=>$array['cardio-temps-2'], ":niveau"=>$array['cardio-niveau-2'], ":resistance"=>$array['cardio-resistance-2'], ":id"=>$id2));
                        
                        if($exec2){
                            try{
                                $sql3 = "UPDATE actiform_program_client_cardio SET temps = (:temps), niveau = (:niveau), resistance = (:resistance) WHERE id = (:id)";
                                $res3 = $this->pdo->prepare($sql3);
                                $exec3 = $res3->execute(array(":temps"=>$array['cardio-temps-3'], ":niveau"=>$array['cardio-niveau-3'], ":resistance"=>$array['cardio-resistance-3'], ":id"=>$id3));

                                if($exec3){
                                    try{
                                        $sql4 = "UPDATE actiform_program_client_cardio SET temps = (:temps), niveau = (:niveau), resistance = (:resistance) WHERE id = (:id)";
                                        $res4 = $this->pdo->prepare($sql4);
                                        $exec4 = $res4->execute(array(":temps"=>$array['cardio-temps-4'], ":niveau"=>$array['cardio-niveau-4'], ":resistance"=>$array['cardio-resistance-4'], ":id"=>$id4));
                    
                                    }
                                    catch(Exception $e4){
                                        $tupleUpdated = false;        
                                    }
                
                                }
                    
                            }
                            catch(Exception $e3){
                                $tupleUpdated = false;        
                            }
        
                        }
            
                    }
                    catch(Exception $e2){
                        $tupleUpdated = false;        
                    }

                }
            }
            catch(Exception $e1) {
                $tupleUpdated = false;
            }
        }
        
        return $tupleUpdated;
    }

}