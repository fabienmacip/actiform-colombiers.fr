<?php

$resultHTMLFessiers .= "<div class='program-title'>FESSIERS</div>";
$resultHTMLFessiers .= "<div class='program-subtitle'>";
$resultHTMLFessiers .= "<div>Nom machines</div><div>S&eacute;ances</div><div>1</div><div>2</div><div>3</div><div>4</div>";
$resultHTMLFessiers .= "</div>";

if(!empty($requestFessierss)) {
  
  $cptLine = 0;
  $cptCol = 0;
  
  // Si connecté en ADMIN, les champs sont des INPUTS
  if($role === 1){
    $inputMaxLength = 20;  

    $cptIdFessiers = 1;
    $_ID_MAX_FESSIERS = 12; // Nb de lignes dans la table actiform_program_abdos

    $requestIndex = 0;
    /* foreach($request as $line) { */
      
      while($cptIdFessiers <= $_ID_MAX_FESSIERS){

        $IdFessiers = $cptIdFessiers;
        $idClientFessiers = "0";
        $series1 = "";
        $repetitions1 = "";
        $charge1 = "";
        $series2 = "";
        $repetitions2 = "";
        $charge2 = "";
        $series3 = "";
        $repetitions3 = "";
        $charge3 = "";
        $series4 = "";
        $repetitions4 = "";
        $charge4 = "";

        // Si la ligne existe en BDD.
        if(!empty($requestFessiers) && count($requestFessiers) >= 0 && count($requestFessiers) > $requestIndex && intval($requestFessiers[$requestIndex]->getIdFessiers()) === $cptIdFessiers) {
          $line = $requestFessiers[$requestIndex];

          $IdFessiers = $line->getIdFessiers();
          $idForm = $clientId."-".$IdFessiers;
          
          $idClientFessiers = $line->getId();
          $series1 = $line->getSeries1();
          $repetitions1 = $line->getRepetitions1();
          $charge1 = $line->getCharge1();
          $series2 = $line->getSeries2();
          $repetitions2 = $line->getRepetitions2();
          $charge2 = $line->getCharge2();
          $series3 = $line->getSeries3();
          $repetitions3 = $line->getRepetitions3();
          $charge3 = $line->getCharge3();
          $series4 = $line->getSeries4();
          $repetitions4 = $line->getRepetitions4();
          $charge4 = $line->getCharge4();
          
          $requestIndex++;
        }

        
        // Colonne TITRES
        $resultHTMLFessiers .= "<div class='cardio-big-line'>";
        $resultHTMLFessiers .= "<form action='' method='post' id='form-fessiers-".$IdFessiers."' class='form-fessiers'>";
        $resultHTMLFessiers .= "<input type='hidden' name='token' id='token' value='<?= $token ?>'>";
        $resultHTMLFessiers .= "<input type='hidden' id='id-client-fessiers' name='id-client-fessiers' value='".$idClientFessiers."'>";
        $resultHTMLFessiers .= "<div class='cardio-nom-machines'><div class='cardio-img'>";
        $resultHTMLFessiers .= "<img src='img/program/".$requestFessierss[$cptLine]->getImg()."' onclick=updateFessiersCells('".$IdFessiers."')>";
        $resultHTMLFessiers .= "</div><div class='cardio-nom'>".$requestFessierss[$cptLine]->getNom()."</div></div>";
        $resultHTMLFessiers .= "<div class='cardio-parametres'><div>S&eacute;ries</div><div>R&eacute;p&eacute;titions</div><div>Charge</div></div>";
        $cptLine++;
        
        // Colonne SEANCE 1
        $resultHTMLFessiers .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='fessiers-series1-".$idClientFessiers."' name='fessiers-series1' value='".$series1."'></div>";
        $resultHTMLFessiers .= "<div><input type='text' maxlength='".$inputMaxLength."' id='fessiers-repetitions1-".$idClientFessiers."' name='fessiers-repetitions1' value='".$repetitions1."'></div>";
        $resultHTMLFessiers .= "<div><input type='text' maxlength='".$inputMaxLength."' id='fessiers-charge1-".$idClientFessiers."' name='fessiers-charge1' value='".$charge1."'></div></div>";

        // Colonne SEANCE 2 
        $resultHTMLFessiers .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='fessiers-series2-".$idClientFessiers."' name='fessiers-series2' value='".$series2."'></div>";
        $resultHTMLFessiers .= "<div><input type='text' maxlength='".$inputMaxLength."' id='fessiers-repetitions2-".$idClientFessiers."' name='fessiers-repetitions2' value='".$repetitions2."'></div>";
        $resultHTMLFessiers .= "<div><input type='text' maxlength='".$inputMaxLength."' id='fessiers-charge2' name='fessiers-charge2' value='".$charge2."'></div></div>";

        // Colonne SEANCE 3
        $resultHTMLFessiers .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='fessiers-series3-".$idClientFessiers."' name='fessiers-series3' value='".$series3."'></div>";
        $resultHTMLFessiers .= "<div><input type='text' maxlength='".$inputMaxLength."' id='fessiers-repetitions3-".$idClientFessiers."' name='fessiers-repetitions3' value='".$repetitions3."'></div>";
        $resultHTMLFessiers .= "<div><input type='text' maxlength='".$inputMaxLength."' id='fessiers-charge3-".$idClientFessiers."' name='fessiers-charge3' value='".$charge3."'></div></div>";

        // Colonne SEANCE 4
        $resultHTMLFessiers .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='fessiers-series4-".$idClientFessiers."' name='fessiers-series4' value='".$series4."'></div>";
        $resultHTMLFessiers .= "<div><input type='text' maxlength='".$inputMaxLength."' id='fessiers-repetitions4-".$idClientFessiers."' name='fessiers-repetitions4' value='".$repetitions4."'></div>";
        $resultHTMLFessiers .= "<div><input type='text' maxlength='".$inputMaxLength."' id='fessiers-charge4' name='fessiers-charge4' value='".$charge4."'></div></div>";
        
        // FIN du FORMULAIRE
        $resultHTMLFessiers .= "<input type='hidden' name='action' id='action' value='clientfessiersUpdate'>";
        $resultHTMLFessiers .= "<input type='hidden' name='clientid' id='clientid' value='".$clientId."'>";
        $resultHTMLFessiers .= "<input type='hidden' name='fessiersid' id='fessiersid' value='".$IdFessiers."'>";
        $resultHTMLFessiers .= "<input type='hidden' name='clientfessiersid' id='clientfessiersid' value='".$idClientFessiers."'>";
        $resultHTMLFessiers .= "</form>";
        $resultHTMLFessiers .= "</div>";

        $cptIdFessiers++;


      }
    
 
  
  } else {
    $cptIdFessiers = 1;
    $_ID_MAX_FESSIERS = 12; // Nb de lignes dans la table actiform_program_abdos

    $requestIndex = 0;
    /* foreach($request as $line) { */
      
      while($cptIdFessiers <= $_ID_MAX_FESSIERS){

/*         $IdFessiers = $cptIdFessiers;
        $idClientFessiers = "0";
 */        $series1 = "";
        $repetitions1 = "";
        $charge1 = "";
        $series2 = "";
        $repetitions2 = "";
        $charge2 = "";
        $series3 = "";
        $repetitions3 = "";
        $charge3 = "";
        $series4 = "";
        $repetitions4 = "";
        $charge4 = "";

        // Si la ligne existe en BDD.
        if(!empty($requestFessiers) && count($requestFessiers) >= 0 && count($requestFessiers) > $requestIndex && intval($requestFessiers[$requestIndex]->getIdFessiers()) === $cptIdFessiers) {
          $line = $requestFessiers[$requestIndex];

/*           $IdFessiers = $line->getIdFessiers();
          $idForm = $clientId."-".$IdFessiers;
          
          $idClientFessiers = $line->getId();
 */          $series1 = $line->getSeries1();
          $repetitions1 = $line->getRepetitions1();
          $charge1 = $line->getCharge1();
          $series2 = $line->getSeries2();
          $repetitions2 = $line->getRepetitions2();
          $charge2 = $line->getCharge2();
          $series3 = $line->getSeries3();
          $repetitions3 = $line->getRepetitions3();
          $charge3 = $line->getCharge3();
          $series4 = $line->getSeries4();
          $repetitions4 = $line->getRepetitions4();
          $charge4 = $line->getCharge4();
          
          $requestIndex++;
        }

        
        // Colonne TITRES
        $resultHTMLFessiers .= "<div class='cardio-big-line'>";
        $resultHTMLFessiers .= "<div class='cardio-nom-machines'><div class='cardio-img'>";
        $resultHTMLFessiers .= "<img src='img/program/".$requestFessierss[$cptLine]->getImg()."'>";
        $resultHTMLFessiers .= "</div><div class='cardio-nom'>".$requestFessierss[$cptLine]->getNom()."</div></div>";
        $resultHTMLFessiers .= "<div class='cardio-parametres'><div>S&eacute;ries</div><div>R&eacute;p&eacute;titions</div><div>Charge</div></div>";
        $cptLine++;
        
        // Colonne SEANCE 1
        $resultHTMLFessiers .= "<div class='cardio-seance'><div>".$series1."</div>";
        $resultHTMLFessiers .= "<div>".$repetitions1."</div>";
        $resultHTMLFessiers .= "<div>".$charge1."</div></div>";

        // Colonne SEANCE 2 
        $resultHTMLFessiers .= "<div class='cardio-seance'><div>".$series2."</div>";
        $resultHTMLFessiers .= "<div>".$repetitions2."</div>";
        $resultHTMLFessiers .= "<div>".$charge2."</div></div>";

        // Colonne SEANCE 3
        $resultHTMLFessiers .= "<div class='cardio-seance'><div>".$series3."</div>";
        $resultHTMLFessiers .= "<div>".$repetitions3."</div>";
        $resultHTMLFessiers .= "<div>".$charge3."</div></div>";

        // Colonne SEANCE 4
        $resultHTMLFessiers .= "<div class='cardio-seance'><div>".$series4."</div>";
        $resultHTMLFessiers .= "<div>".$repetitions4."</div>";
        $resultHTMLFessiers .= "<div>".$charge4."</div></div>";
        
        $resultHTMLFessiers .= "</div>";

        $cptIdFessiers++;


      }
    

  }  
}


