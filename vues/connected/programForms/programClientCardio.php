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


/* 
$response->getId();
$response->getIdClient();
$response->getIdCardio();
$response->getNumSeance();
$response->getTemps();
$response->getNiveau();
$response->getResistance(); */