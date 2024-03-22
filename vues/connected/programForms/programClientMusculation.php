<?php

$resultHTMLMuscu .= "<div class='program-title'>MUSCULATION</div>";
$resultHTMLMuscu .= "<div class='program-subtitle'>";
$resultHTMLMuscu .= "<div>Nom machines</div><div>S&eacute;ances</div><div>1</div><div>2</div><div>3</div><div>4</div>";
$resultHTMLMuscu .= "</div>";

if(!empty($requestMuscu) && count($requestMuscu) > 0 && !empty($requestMusculations)) {
  // IMPORTANT : lors de la création d'un nouveau client, l'application crée en même temps,
  // tous les tuples concernant ce client, dans les tables actiform_program_client_cardio,
  // actiform_program_client_musculation, etc. Avec des champs vides par défaut, sauf pour :
  // idclient, idcardio (ou idmusculation, etc), numseance.

  $cptLine = 0;
  $cptCol = 0;
  foreach($requestMuscu as $line) {
    if($cptCol === 0){
      $resultHTMLMuscu .= "<div class='cardio-big-line'><div class='cardio-nom-machines'><div class='cardio-img'>";
      $resultHTMLMuscu .= "<img src='img/program/".$requestMusculations[$cptLine]->getImg()."'>";
      $resultHTMLMuscu .= "</div><div class='cardio-nom'>".$requestMusculations[$cptLine]->getNom()."</div></div>";
      $resultHTMLMuscu .= "<div class='cardio-parametres'><div>Poids</div><div>S&eacute;ries</div><div>R&eacute;p&eacute;titions</div><div>R&eacute;cup&eacute;ration</div></div>";
      $cptLine++;
    }

    $resultHTMLMuscu .= "<div class='cardio-seance'><div>".$line->getPoids()."</div><div>".$line->getSeries()."</div><div>".$line->getRepetitions()."</div><div>".$line->getRecuperation()."</div></div>";
    if($cptCol === 3) {
      $resultHTMLMuscu .= "</div>";
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