<?php

$resultHTMLAbdos .= "<div class='program-title'>ABDOMINAUX</div>";
$resultHTMLAbdos .= "<div class='program-subtitle'>";
$resultHTMLAbdos .= "<div>Nom machines</div><div>S&eacute;ances</div><div>1</div><div>2</div><div>3</div><div>4</div>";
$resultHTMLAbdos .= "</div>";

if(!empty($requestAbdoss)) {
  
  $cptLine = 0;
  $cptCol = 0;
  
  // Si connecté en ADMIN, les champs sont des INPUTS
  if($role === 1){
    $inputMaxLength = 20;  

    $cptIdAbdos = 1;
    $_ID_MAX_ABDOS = 20; // Nb de lignes dans la table actiform_program_abdos

    $requestIndex = 0;
    /* foreach($request as $line) { */
      
      while($cptIdAbdos <= $_ID_MAX_ABDOS){

        $idAbdos = $cptIdAbdos;
        $idClientAbdos = "0";
        $series1 = "";
        $repetitions1 = "";
        $charge1 = "";
        $recuperation1 = "";
        $series2 = "";
        $repetitions2 = "";
        $charge2 = "";
        $recuperation2 = "";
        $series3 = "";
        $repetitions3 = "";
        $charge3 = "";
        $recuperation3 = "";
        $series4 = "";
        $repetitions4 = "";
        $charge4 = "";
        $recuperation4 = "";

        // Si la ligne existe en BDD.
        if(!empty($requestAbdos) && count($requestAbdos) >= 0 && count($requestAbdos) > $requestIndex && intval($requestAbdos[$requestIndex]->getIdAbdos()) === $cptIdAbdos) {
          $line = $requestAbdos[$requestIndex];

          $idAbdos = $line->getIdAbdos();
          $idForm = $clientId."-".$idAbdos;
          
          $idClientAbdos = $line->getId();
          $series1 = $line->getSeries1();
          $repetitions1 = $line->getRepetitions1();
          $charge1 = $line->getCharge1();
          $recuperation1 = $line->getRecuperation1();
          $series2 = $line->getSeries2();
          $repetitions2 = $line->getRepetitions2();
          $charge2 = $line->getCharge2();
          $recuperation2 = $line->getRecuperation2();
          $series3 = $line->getSeries3();
          $repetitions3 = $line->getRepetitions3();
          $charge3 = $line->getCharge3();
          $recuperation3 = $line->getRecuperation3();
          $series4 = $line->getSeries4();
          $repetitions4 = $line->getRepetitions4();
          $charge4 = $line->getCharge4();
          $recuperation4 = $line->getRecuperation4();
          
          $requestIndex++;
        }

        
        // Colonne TITRES
        $resultHTMLAbdos .= "<div class='cardio-big-line'>";
        $resultHTMLAbdos .= "<form action='' method='post' id='form-abdos-".$idAbdos."' class='form-abdos'>";
        $resultHTMLAbdos .= "<input type='hidden' name='token' id='token' value='<?= $token ?>'>";
        $resultHTMLAbdos .= "<input type='hidden' id='id-client-abdos' name='id-client-abdos' value='".$idClientAbdos."'>";
        $resultHTMLAbdos .= "<div class='cardio-nom-machines'><div class='cardio-img'>";
        $resultHTMLAbdos .= "<img src='img/program/".$requestAbdoss[$cptLine]->getImg()."' onclick=updateAbdosCells('".$idAbdos."')>";
        $resultHTMLAbdos .= "</div><div class='cardio-nom'>".$requestAbdoss[$cptLine]->getNom()."</div></div>";
        $resultHTMLAbdos .= "<div class='cardio-parametres'><div>S&eacute;ries</div><div>R&eacute;p&eacute;titions</div><div>Charge</div><div>R&eacute;cup&eacute;ration</div></div>";
        $cptLine++;
        
        // Colonne SEANCE 1
        $resultHTMLAbdos .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='abdos-series1-".$idClientAbdos."' name='abdos-series1' value='".$series1."'></div>";
        $resultHTMLAbdos .= "<div><input type='text' maxlength='".$inputMaxLength."' id='abdos-repetitions1-".$idClientAbdos."' name='abdos-repetitions1' value='".$repetitions1."'></div>";
        $resultHTMLAbdos .= "<div><input type='text' maxlength='".$inputMaxLength."' id='abdos-charge1-".$idClientAbdos."' name='abdos-charge1' value='".$charge1."'></div>";
        $resultHTMLAbdos .= "<div><input type='text' maxlength='".$inputMaxLength."' id='abdos-recuperation1-".$idClientAbdos."' name='abdos-recuperation1' value='".$recuperation1."'></div></div>";

        // Colonne SEANCE 2 
        $resultHTMLAbdos .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='abdos-series2-".$idClientAbdos."' name='abdos-series2' value='".$series2."'></div>";
        $resultHTMLAbdos .= "<div><input type='text' maxlength='".$inputMaxLength."' id='abdos-repetitions2-".$idClientAbdos."' name='abdos-repetitions2' value='".$repetitions2."'></div>";
        $resultHTMLAbdos .= "<div><input type='text' maxlength='".$inputMaxLength."' id='abdos-charge2' name='abdos-charge2' value='".$charge2."'></div>";
        $resultHTMLAbdos .= "<div><input type='text' maxlength='".$inputMaxLength."' id='abdos-recuperation2-".$idClientAbdos."' name='abdos-recuperation2' value='".$recuperation2."'></div></div>";

        // Colonne SEANCE 3
        $resultHTMLAbdos .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='abdos-series3-".$idClientAbdos."' name='abdos-series3' value='".$series3."'></div>";
        $resultHTMLAbdos .= "<div><input type='text' maxlength='".$inputMaxLength."' id='abdos-repetitions3-".$idClientAbdos."' name='abdos-repetitions3' value='".$repetitions3."'></div>";
        $resultHTMLAbdos .= "<div><input type='text' maxlength='".$inputMaxLength."' id='abdos-charge3-".$idClientAbdos."' name='abdos-charge3' value='".$charge3."'></div>";
        $resultHTMLAbdos .= "<div><input type='text' maxlength='".$inputMaxLength."' id='abdos-recuperation3-".$idClientAbdos."' name='abdos-recuperation3' value='".$recuperation3."'></div></div>";

        // Colonne SEANCE 4
        $resultHTMLAbdos .= "<div class='cardio-seance'><div><input type='text' maxlength='".$inputMaxLength."' id='abdos-series4-".$idClientAbdos."' name='abdos-series4' value='".$series4."'></div>";
        $resultHTMLAbdos .= "<div><input type='text' maxlength='".$inputMaxLength."' id='abdos-repetitions4-".$idClientAbdos."' name='abdos-repetitions4' value='".$repetitions4."'></div>";
        $resultHTMLAbdos .= "<div><input type='text' maxlength='".$inputMaxLength."' id='abdos-charge4' name='abdos-charge4' value='".$charge4."'></div>";
        $resultHTMLAbdos .= "<div><input type='text' maxlength='".$inputMaxLength."' id='abdos-recuperation4-".$idClientAbdos."' name='abdos-recuperation4' value='".$recuperation4."'></div></div>";
        
        // FIN du FORMULAIRE
        $resultHTMLAbdos .= "<input type='hidden' name='action' id='action' value='clientAbdosUpdate'>";
        $resultHTMLAbdos .= "<input type='hidden' name='clientid' id='clientid' value='".$clientId."'>";
        $resultHTMLAbdos .= "<input type='hidden' name='abdosid' id='abdosid' value='".$idAbdos."'>";
        $resultHTMLAbdos .= "<input type='hidden' name='clientabdosid' id='clientabdosid' value='".$idClientAbdos."'>";
        $resultHTMLAbdos .= "</form>";
        $resultHTMLAbdos .= "</div>";

        $cptIdAbdos++;


      }
    
  

    
  
  
  } else {
    $cptIdAbdos = 1;
    $_ID_MAX_ABDOS = 20; // Nb de lignes dans la table actiform_program_abdos

    $requestIndex = 0;
    /* foreach($request as $line) { */
      
      while($cptIdAbdos <= $_ID_MAX_ABDOS){

/*         $idAbdos = $cptIdAbdos;
        $idClientAbdos = "0";
 */        $series1 = "";
        $repetitions1 = "";
        $charge1 = "";
        $recuperation1 = "";
        $series2 = "";
        $repetitions2 = "";
        $charge2 = "";
        $recuperation2 = "";
        $series3 = "";
        $repetitions3 = "";
        $charge3 = "";
        $recuperation3 = "";
        $series4 = "";
        $repetitions4 = "";
        $charge4 = "";
        $recuperation4 = "";

        // Si la ligne existe en BDD.
        if(!empty($requestAbdos) && count($requestAbdos) >= 0 && count($requestAbdos) > $requestIndex && intval($requestAbdos[$requestIndex]->getIdAbdos()) === $cptIdAbdos) {
          $line = $requestAbdos[$requestIndex];

          /* $idAbdos = $line->getIdAbdos();
          $idForm = $clientId."-".$idAbdos; */
          
          /* $idClientAbdos = $line->getId(); */
          $series1 = $line->getSeries1();
          $repetitions1 = $line->getRepetitions1();
          $charge1 = $line->getCharge1();
          $recuperation1 = $line->getRecuperation1();
          $series2 = $line->getSeries2();
          $repetitions2 = $line->getRepetitions2();
          $charge2 = $line->getCharge2();
          $recuperation2 = $line->getRecuperation2();
          $series3 = $line->getSeries3();
          $repetitions3 = $line->getRepetitions3();
          $charge3 = $line->getCharge3();
          $recuperation3 = $line->getRecuperation3();
          $series4 = $line->getSeries4();
          $repetitions4 = $line->getRepetitions4();
          $charge4 = $line->getCharge4();
          $recuperation4 = $line->getRecuperation4();
          
          $requestIndex++;
        }

        
        // Colonne TITRES
        $resultHTMLAbdos .= "<div class='cardio-big-line'>";
        $resultHTMLAbdos .= "<div class='cardio-nom-machines'><div class='cardio-img'>";
        $resultHTMLAbdos .= "<img src='img/program/".$requestAbdoss[$cptLine]->getImg()."'>";
        $resultHTMLAbdos .= "</div><div class='cardio-nom'>".$requestAbdoss[$cptLine]->getNom()."</div></div>";
        $resultHTMLAbdos .= "<div class='cardio-parametres'><div>S&eacute;ries</div><div>R&eacute;p&eacute;titions</div><div>Charge</div><div>R&eacute;cup&eacute;ration</div></div>";
        $cptLine++;
        
        // Colonne SEANCE 1
        $resultHTMLAbdos .= "<div class='cardio-seance'><div>".$series1."</div>";
        $resultHTMLAbdos .= "<div>".$repetitions1."</div>";
        $resultHTMLAbdos .= "<div>".$charge1."</div>";
        $resultHTMLAbdos .= "<div>".$recuperation1."</div></div>";

        // Colonne SEANCE 2 
        $resultHTMLAbdos .= "<div class='cardio-seance'><div>".$series2."</div>";
        $resultHTMLAbdos .= "<div>".$repetitions2."</div>";
        $resultHTMLAbdos .= "<div>".$charge2."</div>";
        $resultHTMLAbdos .= "<div>".$recuperation2."</div></div>";

        // Colonne SEANCE 3
        $resultHTMLAbdos .= "<div class='cardio-seance'><div>".$series3."</div>";
        $resultHTMLAbdos .= "<div>".$repetitions3."</div>";
        $resultHTMLAbdos .= "<div>".$charge3."</div>";
        $resultHTMLAbdos .= "<div>".$recuperation3."</div></div>";

        // Colonne SEANCE 4
        $resultHTMLAbdos .= "<div class='cardio-seance'><div>".$series4."</div>";
        $resultHTMLAbdos .= "<div>".$repetitions4."</div>";
        $resultHTMLAbdos .= "<div>".$charge4."</div>";
        $resultHTMLAbdos .= "<div>".$recuperation4."</div></div>";
        
        $resultHTMLAbdos .= "</div>";

        $cptIdAbdos++;


      }

  }  
}


