<?php

class ProgramClientFessiers
{
    use Modele;

    // READ
    public function listerPourUnClient($clientId)
    {
        if (!is_null($this->pdo)) {
            $sql = 'SELECT * FROM actiform_program_client_fessiers WHERE idclient = :idclient ORDER BY idfessiers';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['idclient' => $clientId]);
        }
        $liste = [];
        while ($element = $stmt->fetchObject('ProgramClientFessiers',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }

    function updateClientFessiers($array){
        
        $id = intval($array['id-client-fessiers']);
        $tupleUpdated = true;
        // Pas d'ID, alors INSERT
        if($id === 0) {
            if (!is_null($this->pdo)) {
                try {
                        $sql = "INSERT INTO actiform_program_client_fessiers (idclient, idfessiers, series1, repetitions1, charge1, series2, repetitions2, charge2, series3, repetitions3, charge3, series4, repetitions4, charge4) 
                                VALUES (:idclient, :idfessiers, :series1, :repetitions1, :charge1, :series2, :repetitions2, :charge2, :series3, :repetitions3, :charge3, :series4, :repetitions4, :charge4)";
                                    
                        $res = $this->pdo->prepare($sql);

                        
                        $exec = $res->execute(array(":idclient"=>$array['clientid'], "idfessiers"=>$array['abdosid'],
                                                    ":series1"=>$array['abdos-series1'], ":repetitions1"=>$array['abdos-repetitions1'], ":charge1"=>$array['abdos-charge1'], 
                                                    ":series2"=>$array['abdos-series2'], ":repetitions2"=>$array['abdos-repetitions2'], ":charge2"=>$array['abdos-charge2'], 
                                                    ":series3"=>$array['abdos-series3'], ":repetitions3"=>$array['abdos-repetitions3'], ":charge3"=>$array['abdos-charge3'], 
                                                    ":series4"=>$array['abdos-series4'], ":repetitions4"=>$array['abdos-repetitions4'], ":charge4"=>$array['abdos-charge4']));
                    
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
                try {
                        $sql = "UPDATE actiform_program_client_fessiers 
                                SET series1 = (:series1), repetitions1 = (:repetitions1), charge1 = (:charge1), 
                                    series2 = (:series2), repetitions2 = (:repetitions2), charge2 = (:charge2), 
                                    series3 = (:series3), repetitions3 = (:repetitions3), charge3 = (:charge3), 
                                    series4 = (:series4), repetitions4 = (:repetitions4), charge4 = (:charge4)
                                    WHERE id = (:id)";
                        $res = $this->pdo->prepare($sql);
                        $exec = $res->execute(array(":series1"=>$array['abdos-series1'], ":repetitions1"=>$array['abdos-repetitions1'], ":charge1"=>$array['abdos-charge1'], 
                                                    ":series2"=>$array['abdos-series2'], ":repetitions2"=>$array['abdos-repetitions2'], ":charge2"=>$array['abdos-charge2'], 
                                                    ":series3"=>$array['abdos-series3'], ":repetitions3"=>$array['abdos-repetitions3'], ":charge3"=>$array['abdos-charge3'], 
                                                    ":series4"=>$array['abdos-series4'], ":repetitions4"=>$array['abdos-repetitions4'], ":charge4"=>$array['abdos-charge4'], 
                                                    ":id"=>$id));
                    
                    $tupleUpdated = $exec;
                }
                catch(Exception $e) {
                    $tupleUpdated = false;
                }
            }
        }

        
        return $tupleUpdated;
    }





}