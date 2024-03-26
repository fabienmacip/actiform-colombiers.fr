<?php

$resultHTML .= "<div class='program-title'>CARDIO</div>";
$resultHTML .= "<div class='program-subtitle'>";
$resultHTML .= "<div>Nom machines</div><div>S&eacute;ances</div><div>1</div><div>2</div><div>3</div><div>4</div>";
$resultHTML .= "</div>";

if(!empty($request) && count($request) > 0 && !empty($requestCardios)) {
  // IMPORTANT : lors de la création d'un nouveau client, l'application crée en même temps,
  // tous les tuples concernant ce client, dans les tables actiform_program_client_cardio,
  // actiform_program_client_musculation, etc. Avec des champs vides par défaut, sauf pour :
    // idclient, idcardio (ou idmusculation, etc), numseance.
    
    $cptLine = 0;
    $cptCol = 0;
    
    // Si connecté en ADMIN, les champs sont des INPUTS
    if($role === 1){
      $inputMaxLength = 20;  

      foreach($request as $line) {
        

        // $idsCardioSeance : concaténation de l'ID de l'exercice + le numéro de séance
        $idsCardioSeance = $line->getIdCardio()."-".$line->getNumSeance();
        $idForm = $clientId."-".$idsCardioSeance;
        
        if($cptCol === 0){
          //action='controleurs/ajax.php' onsubmit='return false'
          $resultHTML .= "<div class='cardio-big-line'>";
          $resultHTML .= "<form action='' method='post' id='form-cardio-".$line->getId()."' class='form-cardio'>";
          $resultHTML .= "<input type='hidden' name='id-client-cardio-first' value='".$line->getId()."'>";
          $resultHTML .= "<div class='cardio-nom-machines'><div class='cardio-img'>";
          $resultHTML .= "<img src='img/program/".$requestCardios[$cptLine]->getImg()."' onclick=updateCardioCells('".$line->getId()."')>";
          $resultHTML .= "</div><div class='cardio-nom'>".$requestCardios[$cptLine]->getNom()."</div></div>";
          $resultHTML .= "<div class='cardio-parametres'><div>Temps</div><div>Niveau</div><div>R&eacute;sistance</div></div>";
          $cptLine++;
        }
    
        $resultHTML .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='cardio-temps-".$idsCardioSeance."' name='cardio-temps-".$line->getNumSeance()."' value='".$line->getTemps()."'></div>";
        $resultHTML .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-niveau-".$idsCardioSeance."' name='cardio-niveau-".$line->getNumSeance()."' value='".$line->getNiveau()."'></div>";
        $resultHTML .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-resistance-".$idsCardioSeance."' name='cardio-resistance-".$line->getNumSeance()."' value='".$line->getResistance()."'></div></div>";


        if($cptCol === 3) {
          $resultHTML .= "<input type='hidden' name='action' id='action' value='clientCardioUpdate'>";
          $resultHTML .= "<input type='hidden' name='clientid' id='clientid' value='".$clientId."'>";
          $resultHTML .= "<input type='hidden' id='ids-cardio-seance-".$idsCardioSeance."' name='ids-cardio-seance-".$idsCardioSeance."' value='".$idsCardioSeance."'>";
          $resultHTML .= "</form>";
          $resultHTML .= "</div>";
        }
        $cptCol = ($cptCol + 1) % 4;
      };
    

      
    
    
    } else {
      foreach($request as $line) {
        if($cptCol === 0){
          $resultHTML .= "<div class='cardio-big-line'><div class='cardio-nom-machines'><div class='cardio-img'>";
          $resultHTML .= "<img src='img/program/".$requestCardios[$cptLine]->getImg()."'>";
          $resultHTML .= "</div><div class='cardio-nom'>".$requestCardios[$cptLine]->getNom()."</div></div>";
          $resultHTML .= "<div class='cardio-parametres'><div>Temps</div><div>Niveau</div><div>R&eacute;sistance</div></div>";
          $cptLine++;
        }
    
        $resultHTML .= "<div class='cardio-seance'><div>".$line->getTemps()."</div><div>".$line->getNiveau()."</div><div>".$line->getResistance()."</div></div>";

        if($cptCol === 3) {
          $resultHTML .= "</div>";
        }
        $cptCol = ($cptCol + 1) % 4;
      };
    }
}


/* 
$response->getId();
$response->getIdClient();
$response->getIdCardio();
$response->getNumSeance();
$response->getTemps();
$response->getNiveau();
$response->getResistance(); */