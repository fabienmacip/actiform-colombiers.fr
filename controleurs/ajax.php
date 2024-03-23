<?php
/* --- TRAITEMENT DE BASE (début) --- */
$content = trim(file_get_contents("php://input"));

$data = json_decode($content, true);
$data['success'] = true;

//echo json_encode($data);
/* --- TRAITEMENT DE BASE (fin) --- */

require_once(dirname(__FILE__,2).'/modeles/ConnectMe.php');
require_once(dirname(__FILE__,2).'/modeles/Modele.php');
require_once(dirname(__FILE__,2).'/modeles/Administrateur.php');
require_once(dirname(__FILE__,2).'/modeles/Administrateurs.php');

require_once(dirname(__FILE__,2).'/modeles/ProgramCardio.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramCardios.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramMusculation.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramMusculations.php');

require_once(dirname(__FILE__,2).'/modeles/ProgramClientCardio.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramClientCardios.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramClientMusculation.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramClientMusculations.php');


class ControleurAjax {
  use Modele;

  public function createClient($prenom, $nom, $mail, $pwd = 'totototo') {
    $administrateurs = new Administrateurs($this->pdo);
    return $administrateurs->create($nom, $prenom, $mail, $pwd);
  }

  public function createClientProgramEmpty($clientId) {
    $programClientCardios = new ProgramClientCardios($this->pdo);
    $checkCardio = $programClientCardios->createAllEmpty($clientId);

    $programClientMusculations = new ProgramClientMusculations($this->pdo);
    $checkMusculation = $programClientMusculations->createAllEmpty($clientId);

    return $checkCardio && $checkMusculation;

  }

  public function updateClient($id, $nom, $prenom, $mail) {
    $administrateurs = new Administrateurs($this->pdo);
    return $administrateurs->update($id, $nom, $prenom, $mail);
  }

  public function deleteClient($id) {
    $administrateurs = new Administrateurs($this->pdo);
    return $administrateurs->deleteWithIdOnly($id);
  }

  public function searchClients($search) {
    $administrateurs = new Administrateurs($this->pdo);
    return $administrateurs->searchClients($search);
  }

  // Liste de fonctions pour affichage du programmes pour un client

  public function programClientCardioRead($clientId) {
    $programClientCardios = new ProgramClientCardios($this->pdo);
    return $programClientCardios->listerPourUnClient($clientId);
  }

  public function readAllCardios() {
    $programCardios = new ProgramCardios($this->pdo);
    return $programCardios->lister();
  }

  public function programClientMusculationRead($clientId) {
    $programClientMusculations = new ProgramClientMusculations($this->pdo);
    return $programClientMusculations->listerPourUnClient($clientId);
  }

  public function readAllMusculations() {
    $programMusculations = new ProgramMusculations($this->pdo);
    return $programMusculations->lister();
  }



} // FIN CLASSE CONTROLEURAJAX

$controllerAjax = new ControleurAjax($pdo);

// CREATE CLIENT
if(isset($data['req']) && $data['req'] === 'add' && $data['table'] === 'client') {
  $data['success'] = $controllerAjax->createClient($data['prenom'],$data['nom'],$data['mail']);

  if($data['success'] !== false && $data['success'] > 0){
    $data['success-initialize-client-program'] = $controllerAjax->createClientProgramEmpty($data['success']);
  }

  echo json_encode($data);
  return;
}

// UPDATE CLIENT
if(isset($data['req']) && $data['req'] === 'update' && $data['table'] === 'client') {
  $data['success'] = $controllerAjax->updateClient(intval($data['id']),$data['nom'],$data['prenom'],$data['mail']);
  echo json_encode($data);
  return;
}

// DELETE CLIENT
if(isset($data['req']) && $data['req'] === 'delete' && $data['table'] === 'client' && $data['id'] !== '' && intval($data['id']) > 0) {
  $data['success'] = $controllerAjax->deleteClient(intval($data['id']));
  echo json_encode($data);
  return;
}


// SEARCH CLIENT
if(isset($_GET['table']) && $_GET['table'] === 'client' && isset($_GET['search']) && $_GET['search'] !== '') {
  $request = $controllerAjax->searchClients($_GET['search']);
  //$titi = $controllerAjax->searchClients($_GET['search']);
  $data['success'] = $request !== '' && count($request) > 0;
  
  $resultHTML = '';
  $resultHTML .= "<div id='search-menu'>";
  if(!empty($request) && count($request) > 0) {

    foreach($request as $response) {
      $resultHTML .= "<a class='search-menu-item' onclick='clientChosenForProgram(".$response->getId().",\"".$response->getPrenom()."\",\"".$response->getNom()."\",\"".$response->getMail()."\")'>";
      $resultHTML .= $response->getPrenom()." ".$response->getNom()." ".$response->getMail()."</a>";
    };

  } else {
    //$resultHTML .= "<div id='search-menu'>Aucun r&eacute;sultat...</div>";
    $resultHTML .= "Aucun r&eacute;sultat...";
  }
  $resultHTML .= "</div>";

  $data['result'] = $resultHTML;

  echo json_encode($data);
}

// LISTER PROGRAM-CLIENT
if(isset($_GET['table']) && $_GET['table'] === 'program-client' && isset($_GET['clientid'])) {
  // Role par défaut, ADMIN = 1. !!! A modifier lors de la création de l'accès par un CLIENT.
  // Ou bien, charger un autre controller-non-admin
  $role = 1;
  $clientId = $_GET['clientid'];
  
  // PROGRAMME CLIENT CARDIO
  $request = $controllerAjax->programClientCardioRead($_GET['clientid']);
  $requestCardios = $controllerAjax->readAllCardios();
  $data['success-cardio'] = $request !== '' && count($request) > 0;

  $resultHTML = '';
  require_once(dirname(__FILE__,2).'/vues/connected/programForms/programClientCardio.php');
  
  // PROGRAMME CLIENT MUSCULATION
  $requestMuscu = $controllerAjax->programClientMusculationRead($_GET['clientid']);
  $requestMusculations = $controllerAjax->readAllMusculations();
  $data['success-musculation'] = $requestMuscu !== '' && count($requestMuscu) > 0;

  $resultHTMLMuscu = '';
  require_once(dirname(__FILE__,2).'/vues/connected/programForms/programClientMusculation.php');

  // PROGRAMME CLIENT ABDOMINAUX...

  // PROGRAMME CLIENT FESSIERS...

  // FIN
  $data['result'] = $resultHTML;
  $data['resultMuscu'] = $resultHTMLMuscu;
  echo json_encode($data);
  return;
}

