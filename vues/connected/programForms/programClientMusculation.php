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
    $_ID_MAX_MUSCU = 11; // Nb de lignes dans la table actiform_program_musculation

    $requestIndex = 0;
    /* foreach($request as $line) { */
      
      while($cptIdMuscu <= $_ID_MAX_MUSCU){

        $idMuscu = $cptIdMuscu;
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

        $numeroAppareil = intval($requestMusculations[$cptLine]->getNumeroAppareil()) <> 0 ? '<br>N°'.$requestMusculations[$cptLine]->getNumeroAppareil() : '';
        // Colonne TITRES
        $resultHTMLMuscu .= "<div class='cardio-big-line'>";
        $resultHTMLMuscu .= "<form action='' method='post' id='form-musculation-".$idMuscu."' class='form-cardio'>";
        $resultHTMLMuscu .= "<input type='hidden' name='id-client-musculation' value='".$idClientMuscu."'>";
        $resultHTMLMuscu .= "<div class='cardio-nom-machines'><div class='cardio-img'>";
        $resultHTMLMuscu .= "<img src='img/program/".$requestMusculations[$cptLine]->getImg()."' onclick=updateMusculationCells('".$idMuscu."')>";
        $resultHTMLMuscu .= "</div><div class='cardio-nom'>".$requestMusculations[$cptLine]->getNom().$numeroAppareil."</div></div>";
        $resultHTMLMuscu .= "<div class='cardio-parametres'><div>Poids</div><div>S&eacute;ries</div><div>R&eacute;p&eacute;titions</div><div>R&eacute;cup&eacute;ration</div></div>";
        $cptLine++;
        
        // Colonne SEANCE 1
        $resultHTMLMuscu .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='musculation-poids1-".$idClientMuscu."' name='musculation-poids1' value='".$poids1."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='musculation-series1-".$idClientMuscu."' name='musculation-series1' value='".$series1."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='musculation-repetitions1-".$idClientMuscu."' name='musculation-repetitions1' value='".$repetitions1."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='musculation-recuperation1-".$idClientMuscu."' name='musculation-recuperation1' value='".$recuperation1."'></div></div>";

        // Colonne SEANCE 2 
        $resultHTMLMuscu .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='musculation-poids2' name='musculation-poids2' value='".$poids2."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='musculation-series2-".$idClientMuscu."' name='musculation-series2' value='".$series2."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='musculation-repetitions2-".$idClientMuscu."' name='musculation-repetitions2' value='".$repetitions2."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='musculation-recuperation2-".$idClientMuscu."' name='musculation-recuperation2' value='".$recuperation2."'></div></div>";

        // Colonne SEANCE 3
        $resultHTMLMuscu .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='musculation-poids3-".$idClientMuscu."' name='musculation-poids3' value='".$poids3."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='musculation-series3-".$idClientMuscu."' name='musculation-series3' value='".$series3."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='musculation-repetitions3-".$idClientMuscu."' name='musculation-repetitions3' value='".$repetitions3."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='musculation-recuperation3-".$idClientMuscu."' name='musculation-recuperation3' value='".$recuperation3."'></div></div>";

        // Colonne SEANCE 4
        $resultHTMLMuscu .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='musculation-poids4' name='musculation-poids4' value='".$poids4."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='musculation-series4-".$idClientMuscu."' name='musculation-series4' value='".$series4."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='musculation-repetitions4-".$idClientMuscu."' name='musculation-repetitions4' value='".$repetitions4."'></div>";
        $resultHTMLMuscu .= "<div><input type='text' maxlength='".$inputMaxLength."' id='musculation-recuperation4-".$idClientMuscu."' name='musculation-recuperation4' value='".$recuperation4."'></div></div>";
        
        // FIN du FORMULAIRE
        $resultHTMLMuscu .= "<input type='hidden' name='action' id='action' value='clientMusculationUpdate'>";
        $resultHTMLMuscu .= "<input type='hidden' name='clientid' id='clientid' value='".$clientId."'>";
        $resultHTMLMuscu .= "<input type='hidden' name='musculationid' id='musculationid' value='".$idMuscu."'>";
        $resultHTMLMuscu .= "<input type='hidden' name='clientmusculationid' id='clientmusculationid' value='".$idClientMuscu."'>";
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


