<?php

$resultHTMLMuscu .= "<div class='program-title'>MUSCULATION</div>";
$resultHTMLMuscu .= "<div class='program-subtitle'>";
$resultHTMLMuscu .= "<div>Nom machines</div><div>S&eacute;ances</div><div>1</div><div>2</div><div>3</div><div>4</div>";
$resultHTMLMuscu .= "</div>";

if(!empty($requestMusculations)) {
  
  $cptLine = 0;
  $cptCol = 0;
  
  // Si connecté en ADMIN, les champs sont des INPUTS
  if($role === 1){
    $inputMaxLength = 20;  

    $cptIdMuscu = 1;
    $_ID_MAX_MUSCU = 7; // Nb de lignes dans la table actiform_program_musculation

    $requestIndex = 0;
    /* foreach($request as $line) { */
      
      while($cptIdMuscu <= $_ID_MAX_MUSCU){

        $idClientMuscu = "0";
        $poids1 = "";
        $series1 = "";
        $repetitions1 = "";
        $recuperation1 = "";
        $poids2 = "";
        $series2 = "";
        $repetitions2 = "";
        $recuperation2 = "";
        $poids3 = "";
        $series3 = "";
        $repetitions3 = "";
        $recuperation3 = "";
        $poids4 = "";
        $series4 = "";
        $repetitions4 = "";
        $recuperation4 = "";

        // Si la ligne existe en BDD.
        if(!empty($requestMuscu) && count($requestMuscu) >= 0 && count($requestMuscu) > $requestIndex && intval($requestMuscu[$requestIndex]->getIdMusculation()) === $cptIdMuscu) {
          $line = $requestMuscu[$requestIndex];

          $idMuscu = $line->getIdMusculation();
          $idForm = $clientId."-".$idMuscu;
          
          $idClientMuscu = $line->getId();
          $poids1 = $line->getPoids1();
          $series1 = $line->getSeries1();
          $repetitions1 = $line->getRepetitions1();
          $recuperation1 = $line->getRecuperation1();
          $poids2 = $line->getPoids2();
          $series2 = $line->getSeries2();
          $repetitions2 = $line->getRepetitions2();
          $recuperation2 = $line->getRecuperation2();
          $poids3 = $line->getPoids3();
          $series3 = $line->getSeries3();
          $repetitions3 = $line->getRepetitions3();
          $recuperation3 = $line->getRecuperation3();
          $poids4 = $line->getPoids4();
          $series4 = $line->getSeries4();
          $repetitions4 = $line->getRepetitions4();
          $recuperation4 = $line->getRecuperation4();
          
          $requestIndex++;
        }


        // Colonne TITRES
        $resultHTMLMuscu .= "<div class='cardio-big-line'>";
        $resultHTMLMuscu .= "<form action='' method='post' id='form-musculation-".$idClientMuscu."' class='form-cardio'>";
        $resultHTMLMuscu .= "<input type='hidden' name='id-client-musculation' value='".$idClientMuscu."'>";
        $resultHTMLMuscu .= "<div class='cardio-nom-machines'><div class='cardio-img'>";
        $resultHTMLMuscu .= "<img src='img/program/".$requestMusculations[$cptLine]->getImg()."' onclick=updateCardioCells('".$idClientMuscu."')>";
        $resultHTMLMuscu .= "</div><div class='cardio-nom'>".$requestMusculations[$cptLine]->getNom()."</div></div>";
        $resultHTMLMuscu .= "<div class='cardio-parametres'><div>Poids</div><div>S&eacute;ries</div><div>R&eacute;p&eacute;titions</div><div>R&eacute;cup&eacute;ration</div></div>";
        $cptLine++;
        
        // Colonne SEANCE 1
        $resultHTMLMuscu .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='cardio-poids1-".$idClientMuscu."' name='cardio-poids1-".$idClientMuscu."' value='".$poids1."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-series1-".$idClientMuscu."' name='cardio-series1-".$idClientMuscu."' value='".$series1."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-repetitions1-".$idClientMuscu."' name='cardio-repetitions1-".$idClientMuscu."' value='".$repetitions1."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-recuperation1-".$idClientMuscu."' name='cardio-recuperation1-".$idClientMuscu."' value='".$recuperation1."'></div></div>";

        // Colonne SEANCE 2 
        $resultHTMLMuscu .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='cardio-poids2-".$idClientMuscu."' name='cardio-poids2-".$idClientMuscu."' value='".$poids2."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-series2-".$idClientMuscu."' name='cardio-series2-".$idClientMuscu."' value='".$series2."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-repetitions2-".$idClientMuscu."' name='cardio-repetitions2-".$idClientMuscu."' value='".$repetitions2."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-recuperation2-".$idClientMuscu."' name='cardio-recuperation2-".$idClientMuscu."' value='".$recuperation2."'></div></div>";

        // Colonne SEANCE 3
        $resultHTMLMuscu .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='cardio-poids3-".$idClientMuscu."' name='cardio-poids3-".$idClientMuscu."' value='".$poids3."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-series3-".$idClientMuscu."' name='cardio-series3-".$idClientMuscu."' value='".$series3."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-repetitions3-".$idClientMuscu."' name='cardio-repetitions3-".$idClientMuscu."' value='".$repetitions3."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-recuperation3-".$idClientMuscu."' name='cardio-recuperation3-".$idClientMuscu."' value='".$recuperation3."'></div></div>";

        // Colonne SEANCE 4
        $resultHTMLMuscu .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='cardio-poids4-".$idClientMuscu."' name='cardio-poids4-".$idClientMuscu."' value='".$poids4."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-series4-".$idClientMuscu."' name='cardio-series4-".$idClientMuscu."' value='".$series4."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-repetitions4-".$idClientMuscu."' name='cardio-repetitions4-".$idClientMuscu."' value='".$repetitions4."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='cardio-recuperation4-".$idClientMuscu."' name='cardio-recuperation4-".$idClientMuscu."' value='".$recuperation4."'></div></div>";
        
        // FIN du FORMULAIRE
        $resultHTMLMuscu .= "<input type='hidden' name='action' id='action' value='clientMusculationUpdate'>";
        $resultHTMLMuscu .= "<input type='hidden' name='clientid' id='clientid' value='".$clientId."'>";
        $resultHTMLMuscu .= "</form>";
        $resultHTMLMuscu .= "</div>";

        $cptIdMuscu++;


      }
    
  

    
  
  
  } else {
    foreach($request as $line) {
      if($cptCol === 0){
        $resultHTMLMuscu .= "<div class='cardio-big-line'><div class='cardio-nom-machines'><div class='cardio-img'>";
        $resultHTMLMuscu .= "<img src='img/program/".$requestCardios[$cptLine]->getImg()."'>";
        $resultHTMLMuscu .= "</div><div class='cardio-nom'>".$requestCardios[$cptLine]->getNom()."</div></div>";
        $resultHTMLMuscu .= "<div class='cardio-parametres'><div>Temps</div><div>Niveau</div><div>R&eacute;sistance</div></div>";
        $cptLine++;
      }
  
      $resultHTMLMuscu .= "<div class='cardio-seance'><div>".$line->getTemps()."</div><div>".$line->getNiveau()."</div><div>".$line->getResistance()."</div></div>";

      if($cptCol === 3) {
        $resultHTMLMuscu .= "</div>";
      }
      $cptCol = ($cptCol + 1) % 4;
    };
  }  
}


