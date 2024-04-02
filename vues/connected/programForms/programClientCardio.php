<?php

$resultHTML .= "<div class='program-title'>CARDIO</div>";
$resultHTML .= "<div class='program-subtitle'>";
$resultHTML .= "<div>Nom machines</div><div>S&eacute;ances</div><div>1</div><div>2</div><div>3</div><div>4</div>";
$resultHTML .= "</div>";

//if(!empty($request) && count($request) > 0 && !empty($requestCardios)) {
  if(!empty($requestCardios)) {
    
    $cptLine = 0;
    $cptCol = 0;
    
    // Si connecté en ADMIN, les champs sont des INPUTS
    if($role === 1){
      $inputMaxLength = 20;  

      $cptIdCardio = 1;
      $_ID_MAX_CARDIO = 7; // Nb de lignes dans la table actiform_program_cardio

      $requestIndex = 0;
      /* foreach($request as $line) { */
        
        while($cptIdCardio <= $_ID_MAX_CARDIO){
          
          $idCardio = $cptIdCardio;
          $idClientCardio = "0";
          $temps1 = "";
          $niveau1 = "";
          $resistance1 = "";
          $temps2 = "";
          $niveau2 = "";
          $resistance2 = "";
          $temps3 = "";
          $niveau3 = "";
          $resistance3 = "";
          $temps4 = "";
          $niveau4 = "";
          $resistance4 = "";

          // Si la ligne existe en BDD.
          if(!empty($request) && count($request) >= 0 && count($request) > $requestIndex && intval($request[$requestIndex]->getIdCardio()) === $cptIdCardio) {
            $line = $request[$requestIndex];

            $idCardio = $line->getIdCardio();
            $idForm = $clientId."-".$idCardio;
            
            $idClientCardio = $line->getId();
            $temps1 = $line->getTemps1();
            $niveau1 = $line->getNiveau1();
            $resistance1 = $line->getResistance1();
            $temps2 = $line->getTemps2();
            $niveau2 = $line->getNiveau2();
            $resistance2 = $line->getResistance2();
            $temps3 = $line->getTemps3();
            $niveau3 = $line->getNiveau3();
            $resistance3 = $line->getResistance3();
            $temps4 = $line->getTemps4();
            $niveau4 = $line->getNiveau4();
            $resistance4 = $line->getResistance4();

            $requestIndex++;
          }

          
          // Colonne TITRES
          $resultHTML .= "<div class='cardio-big-line'>";
          $resultHTML .= "<form action='' method='post' id='form-cardio-".$idCardio."' class='form-cardio'>";
          $resultHTML .= "<input type='hidden' name='token' id='token' value='<?= $token ?>'>";
          $resultHTML .= "<input type='hidden' id='id-client-cardio' name='id-client-cardio' value='".$idClientCardio."'>";
          $resultHTML .= "<div class='cardio-nom-machines'><div class='cardio-img'>";
          $resultHTML .= "<img src='img/program/".$requestCardios[$cptLine]->getImg()."' onclick=updateCardioCells('".$idCardio."')>";
          $resultHTML .= "</div><div class='cardio-nom'>".$requestCardios[$cptLine]->getNom()."</div></div>";
          $resultHTML .= "<div class='cardio-parametres'><div>Temps</div><div>Niveau</div><div>R&eacute;sistance</div></div>";
          $cptLine++;
          
          // Colonne SEANCE 1
          $resultHTML .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='cardio-temps1-".$idClientCardio."' name='cardio-temps1' value='".$temps1."'></div>";
          $resultHTML .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-niveau1-".$idClientCardio."' name='cardio-niveau1' value='".$niveau1."'></div>";
          $resultHTML .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-resistance1-".$idClientCardio."' name='cardio-resistance1' value='".$resistance1."'></div></div>";

          // Colonne SEANCE 2 
          $resultHTML .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='cardio-temps2' name='cardio-temps2' value='".$temps2."'></div>";
          $resultHTML .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-niveau2-".$idClientCardio."' name='cardio-niveau2' value='".$niveau2."'></div>";
          $resultHTML .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-resistance2-".$idClientCardio."' name='cardio-resistance2' value='".$resistance2."'></div></div>";
  
          // Colonne SEANCE 3
          $resultHTML .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='cardio-temps3' name='cardio-temps3' value='".$temps3."'></div>";
          $resultHTML .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-niveau3-".$idClientCardio."' name='cardio-niveau3' value='".$niveau3."'></div>";
          $resultHTML .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-resistance3-".$idClientCardio."' name='cardio-resistance3' value='".$resistance3."'></div></div>";
  
          // Colonne SEANCE 4
          $resultHTML .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='cardio-temps4' name='cardio-temps4' value='".$temps4."'></div>";
          $resultHTML .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-niveau4-".$idClientCardio."' name='cardio-niveau4' value='".$niveau4."'></div>";
          $resultHTML .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-resistance4-".$idClientCardio."' name='cardio-resistance4' value='".$resistance4."'></div></div>";
  
          // FIN du FORMULAIRE
          $resultHTML .= "<input type='hidden' name='action' id='action' value='clientCardioUpdate'>";
          $resultHTML .= "<input type='hidden' name='clientid' id='clientid' value='".$clientId."'>";
          $resultHTML .= "<input type='hidden' name='cardioid' id='cardioid' value='".$idCardio."'>";
          $resultHTML .= "<input type='hidden' name='clientcardioid' id='clientcardioid' value='".$idClientCardio."'>";
          $resultHTML .= "</form>";
          $resultHTML .= "</div>";
  
          $cptIdCardio++;


        }
      
    

      
    
    
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


