<?php

class ProgramClientMusculations
{
    use Modele;

    // READ
    public function listerPourUnClient($clientId)
    {
        if (!is_null($this->pdo)) {
            $sql = 'SELECT * FROM actiform_program_client_musculation WHERE idclient = :idclient ORDER BY idmusculation';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['idclient' => $clientId]);
        }
        $liste = [];
        while ($element = $stmt->fetchObject('ProgramClientMusculation',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }

    function updateClientMusculation($array){
        
        $id = intval($array['id-client-musculation']);
        $tupleUpdated = true;
        // Pas d'ID, alors INSERT
        if($id === 0) {
            if (!is_null($this->pdo)) {
                try {
                        $sql = "INSERT INTO actiform_program_client_musculation (idclient, idmusculation, poids1, series1, repetitions1, recuperation1, poids2, series2, repetitions2, recuperation2, poids3, series3, repetitions3, recuperation3, poids4, series4, repetitions4, recuperation4) 
                                VALUES (:idclient, :idmusculation, :poids1, :series1, :repetitions1, :recuperation1, :poids2, :series2, :repetitions2, :recuperation2, :poids3, :series3, :repetitions3, :recuperation3, :poids4, :series4, :repetitions4, :recuperation4)";
                                    
                        $res = $this->pdo->prepare($sql);

                        
                        $exec = $res->execute(array(":idclient"=>$array['clientid'], "idmusculation"=>$array['musculationid'],
                                                    ":poids1"=>$array['musculation-poids1'], ":series1"=>$array['musculation-series1'], ":repetitions1"=>$array['musculation-repetitions1'], ":recuperation1"=>$array['musculation-recuperation1'],
                                                    ":poids2"=>$array['musculation-poids2'], ":series2"=>$array['musculation-series2'], ":repetitions2"=>$array['musculation-repetitions2'], ":recuperation2"=>$array['musculation-recuperation2'],
                                                    ":poids3"=>$array['musculation-poids3'], ":series3"=>$array['musculation-series3'], ":repetitions3"=>$array['musculation-repetitions3'], ":recuperation3"=>$array['musculation-recuperation3'],
                                                    ":poids4"=>$array['musculation-poids4'], ":series4"=>$array['musculation-series4'], ":repetitions4"=>$array['musculation-repetitions4'], ":recuperation4"=>$array['musculation-recuperation4']));
                    
                    $tupleCreated = $exec;
                }
                catch(Exception $e) {
                    var_dump($e);
                    $tupleUpdated = false;
                }
            }

        } else {
            if (!is_null($this->pdo)) {
                try {
                        $sql = "UPDATE actiform_program_client_musculation 
                                SET poids1 = (:poids1), series1 = (:series1), repetitions1 = (:repetitions1), recuperation1 = (:recuperation1),
                                    poids2 = (:poids2), series2 = (:series2), repetitions2 = (:repetitions2), recuperation2 = (:recuperation2),
                                    poids3 = (:poids3), series3 = (:series3), repetitions3 = (:repetitions3), recuperation3 = (:recuperation3),
                                    poids4 = (:poids4), series4 = (:series4), repetitions4 = (:repetitions4), recuperation4 = (:recuperation4)
                                    WHERE id = (:id)";
                        $res = $this->pdo->prepare($sql);
                        $exec = $res->execute(array(":poids1"=>$array['musculation-poids1'], ":series1"=>$array['musculation-series1'], ":repetitions1"=>$array['musculation-repetitions1'], ":recuperation1"=>$array['musculation-recuperation1'], 
                                                    ":poids2"=>$array['musculation-poids2'], ":series2"=>$array['musculation-series2'], ":repetitions2"=>$array['musculation-repetitions2'], ":recuperation2"=>$array['musculation-recuperation2'], 
                                                    ":poids3"=>$array['musculation-poids3'], ":series3"=>$array['musculation-series3'], ":repetitions3"=>$array['musculation-repetitions3'], ":recuperation3"=>$array['musculation-recuperation3'], 
                                                    ":poids4"=>$array['musculation-poids4'], ":series4"=>$array['musculation-series4'], ":repetitions4"=>$array['musculation-repetitions4'], ":recuperation4"=>$array['musculation-recuperation4'], 
                                                    ":id"=>$id));
                    
                    $tupleCreated = $exec;
                }
                catch(Exception $e) {
                    $tupleUpdated = false;
                }
            }
        }

        
        return $tupleUpdated;
    }


    // CREATE
    public function createAllEmpty($idClient) {
        if (!is_null($this->pdo)) {
            try {
                $sql = "INSERT INTO actiform_program_client_musculation (idclient, idmusculation, numseance) 
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