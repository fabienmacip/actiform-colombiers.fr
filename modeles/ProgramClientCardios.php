<?php

class ProgramClientCardios
{
    use Modele;

    // READ
    public function listerPourUnClient($clientId)
    {
        if (!is_null($this->pdo)) {
            $sql = 'SELECT * FROM actiform_program_client_cardio WHERE idclient = :idclient ORDER BY idcardio';
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


    function updateClientCardio($array){
        
        $id = intval($array['id-client-cardio']);
        $tupleUpdated = true;
        //var_dump("ID CLIENT CARDIO -> ".$id);
        // Pas d'ID, alors INSERT
        if($id === 0) {
            //echo("PASSE PAR INSERT");
            if (!is_null($this->pdo)) {
                try {
                        $sql = "INSERT INTO actiform_program_client_cardio (idclient, idcardio, temps1, niveau1, resistance1, temps2, niveau2, resistance2, temps3, niveau3, resistance3, temps4, niveau4, resistance4) 
                                VALUES (:idclient, :idcardio, :temps1, :niveau1, :resistance1, :temps2, :niveau2, :resistance2, :temps3, :niveau3, :resistance3, :temps4, :niveau4, :resistance4)";
                                    
                        $res = $this->pdo->prepare($sql);

                        
                        $exec = $res->execute(array(":idclient"=>$array['clientid'], "idcardio"=>$array['cardioid'],
                                                    ":temps1"=>$array['cardio-temps1'], ":niveau1"=>$array['cardio-niveau1'], ":resistance1"=>$array['cardio-resistance1'],
                                                    ":temps2"=>$array['cardio-temps2'], ":niveau2"=>$array['cardio-niveau2'], ":resistance2"=>$array['cardio-resistance2'],
                                                    ":temps3"=>$array['cardio-temps3'], ":niveau3"=>$array['cardio-niveau3'], ":resistance3"=>$array['cardio-resistance3'],
                                                    ":temps4"=>$array['cardio-temps4'], ":niveau4"=>$array['cardio-niveau4'], ":resistance4"=>$array['cardio-resistance4']));
                    
                        if($exec) {
                            //$tupleCreated = $exec;
                            $lastid = $this->pdo->lastInsertId();
                            $tupleUpdated = $lastid ?? true;
                        }
                }
                catch(Exception $e) {
                    var_dump($e);
                    $tupleUpdated = false;
                }
            }

        } else {
            
            if (!is_null($this->pdo)) {
                //echo("PASSE PAR UPDATE");
                try {
                        $sql = "UPDATE actiform_program_client_cardio 
                                SET temps1 = (:temps1), niveau1 = (:niveau1), resistance1 = (:resistance1),
                                    temps2 = (:temps2), niveau2 = (:niveau2), resistance2 = (:resistance2),
                                    temps3 = (:temps3), niveau3 = (:niveau3), resistance3 = (:resistance3),
                                    temps4 = (:temps4), niveau4 = (:niveau4), resistance4 = (:resistance4)  
                                    WHERE id = (:id)";
                        $res = $this->pdo->prepare($sql);
                        $exec = $res->execute(array(":temps1"=>$array['cardio-temps1'], ":niveau1"=>$array['cardio-niveau1'], ":resistance1"=>$array['cardio-resistance1'],
                                                    ":temps2"=>$array['cardio-temps2'], ":niveau2"=>$array['cardio-niveau2'], ":resistance2"=>$array['cardio-resistance2'],
                                                    ":temps3"=>$array['cardio-temps3'], ":niveau3"=>$array['cardio-niveau3'], ":resistance3"=>$array['cardio-resistance3'],
                                                    ":temps4"=>$array['cardio-temps4'], ":niveau4"=>$array['cardio-niveau4'], ":resistance4"=>$array['cardio-resistance4'],                                                
                                                    ":id"=>$id));
                    
                    $tupleUpdated = $exec;
                }
                catch(Exception $e) {
                    var_dump($e);
                    $tupleUpdated = false;
                }
            }
        }

        
        return $tupleUpdated;
    }

}