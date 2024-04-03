<?php
/* --- TRAITEMENT DE BASE (début) --- */
$content = trim(file_get_contents("php://input"));

$data = json_decode($content, true);
$data['success'] = true;

//echo json_encode($data);
/* --- TRAITEMENT DE BASE (fin) --- */

require_once(dirname(__FILE__,2).'/modeles/ConnectMe.php');
require_once(dirname(__FILE__,2).'/modeles/Modele.php');
require_once(dirname(__FILE__,2).'/services/checkToken.php');

require_once(dirname(__FILE__,2).'/modeles/Administrateur.php');
require_once(dirname(__FILE__,2).'/modeles/Administrateurs.php');

require_once(dirname(__FILE__,2).'/modeles/ProgramCardio.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramCardios.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramMusculation.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramMusculations.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramAbdos.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramAbdoss.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramFessiers.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramFessierss.php');

require_once(dirname(__FILE__,2).'/modeles/ProgramClientCardio.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramClientCardios.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramClientMusculation.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramClientMusculations.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramClientAbdos.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramClientAbdoss.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramClientFessiers.php');
require_once(dirname(__FILE__,2).'/modeles/ProgramClientFessierss.php');



class ControleurAjax {
  use Modele;

  public function checkTokenExists($token) {
    $administrateurs = new Administrateurs($this->pdo);
    return $administrateurs->checkTokenExists($token);
  }

  public function getRoleFromToken($token) {
    $administrateurs = new Administrateurs($this->pdo);
    return $administrateurs->getRoleFromToken($token);
  }

  public function genereatePassword(){
    $passList = ['Fitness','Muscu','Abdos','Actiform','Janvier','Mars','Avril','Mai','Juin','Juillet','Septembre','Octobre','Novembre','Presse','Curl','Legs','Extension','Flexion'];
    $word1 = $passList[rand(0,count($passList)-1)];
    $word2 = $passList[rand(0,count($passList)-1)];
    $word3 = rand(10,99);
    return $word1.$word2.$word3;
  }

  public function createClient($prenom, $nom, $mail, $pwd = 'totototo') {
    if($pwd === '' || $pwd === 'totototo') {
      $pwd = $this->genereatePassword();
    }

    $administrateurs = new Administrateurs($this->pdo);
    $adminCreatedOK = $administrateurs->create($nom, $prenom, $mail, $pwd);

    /* echo("CREATE CLIENT Controleur : ".$nom." ".$prenom." ".$mail);
    echo($adminCreatedOK); */

    if($adminCreatedOK) {
      require_once(dirname(__FILE__,2).'/services/sendMailAccountCreated.php');
    }

    return $adminCreatedOK;
  }

  public function updateClient($id, $nom, $prenom, $mail) {
    $administrateurs = new Administrateurs($this->pdo);
    //echo("Update Client Controleur:  ".$id." ".$nom." ".$prenom." ".$mail);
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

  public function programClientAbdosRead($clientId) {
    $programClientAbdoss = new ProgramClientAbdoss($this->pdo);
    return $programClientAbdoss->listerPourUnClient($clientId);
  }

  public function readAllAbdoss() {
    $programAbdoss = new ProgramAbdoss($this->pdo);
    return $programAbdoss->lister();
  }

  public function programClientFessiersRead($clientId) {
    $programClientFessierss = new ProgramClientFessierss($this->pdo);
    return $programClientFessierss->listerPourUnClient($clientId);
  }

  public function readAllFessierss() {
    $programFessierss = new ProgramFessierss($this->pdo);
    return $programFessierss->lister();
  }



  // UPDATE CLIENTS CARDIO
  function updateClientCardio($array) {
    $programClientCardios = new ProgramClientCardios($this->pdo);
    return $programClientCardios->updateClientCardio($array);
  }

  // UPDATE CLIENTS MUSCULATION
  function updateClientMusculation($array) {
    $programClientMusculations = new ProgramClientMusculations($this->pdo);
    return $programClientMusculations->updateClientMusculation($array);
  }

    // UPDATE CLIENTS ABDOS
    function updateClientAbdos($array) {
      $programClientAbdoss = new ProgramClientAbdoss($this->pdo);
      return $programClientAbdoss->updateClientAbdos($array);
    }
      // UPDATE CLIENTS FESSIERS
    function updateClientFessiers($array) {
      $programClientFessierss = new ProgramClientFessierss($this->pdo);
      return $programClientFessierss->updateClientFessiers($array);
    }

  

} // FIN CLASSE CONTROLEURAJAX

$controllerAjax = new ControleurAjax($pdo);

// CREATE CLIENT
if(isset($data['req']) && $data['req'] === 'add' && $data['table'] === 'client' && $controllerAjax->checkTokenExists($data['token'])) {
  $data['success'] = $controllerAjax->createClient($data['prenom'],$data['nom'],$data['mail']);

  echo json_encode($data);
  return;
}

// UPDATE CLIENT
if(isset($data['req']) && $data['req'] === 'update' && $data['table'] === 'client' && $controllerAjax->checkTokenExists($data['token'])) {
  $data['success'] = $controllerAjax->updateClient(intval($data['id']),$data['nom'],$data['prenom'],$data['mail']);
  echo json_encode($data);
  return;
}

// DELETE CLIENT
if(isset($data['req']) && $data['req'] === 'delete' && $data['table'] === 'client' && $data['id'] !== '' && intval($data['id']) > 0 && $controllerAjax->checkTokenExists($data['token'])) {
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
if(isset($_GET['table']) && $_GET['table'] === 'program-client' && isset($_GET['clientid']) && $controllerAjax->checkTokenExists($_GET['token'])) {
  // Role par défaut, ADMIN = 1. !!! A modifier lors de la création de l'accès par un CLIENT.
  // Ou bien, charger un autre controller-non-admin
  $role = intval($controllerAjax->getRoleFromToken($_GET['token']));
  $clientId = $_GET['clientid'];
  
  $token = $_GET['token'];

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
  $requestAbdos = $controllerAjax->programClientAbdosRead($_GET['clientid']);
  $requestAbdoss = $controllerAjax->readAllAbdoss();
  $data['success-abdos'] = $requestAbdos !== '' && count($requestAbdos) > 0;

  $resultHTMLAbdos = '';
  require_once(dirname(__FILE__,2).'/vues/connected/programForms/programClientAbdos.php');


  // PROGRAMME CLIENT FESSIERS...
  $requestFessiers = $controllerAjax->programClientFessiersRead($_GET['clientid']);
  $requestFessierss = $controllerAjax->readAllFessierss();
  $data['success-fessiers'] = $requestFessiers !== '' && count($requestFessiers) > 0;

  $resultHTMLFessiers = '';
  require_once(dirname(__FILE__,2).'/vues/connected/programForms/programClientFessiers.php');


  // FIN
  $data['result'] = $resultHTML;
  $data['resultMuscu'] = $resultHTMLMuscu;
  $data['resultAbdos'] = $resultHTMLAbdos;
  $data['resultFessiers'] = $resultHTMLFessiers;
  echo json_encode($data);
  return;
}

// UPDATE PROGRAM-CLIENT-CARDIO-UN-EXERCICE
if(isset($data['req']) && $data['req'] === 'updateClientCardio') {
  $datas = str_replace('\\',"",$data['datas']);
  unset($data['datas']);
  $datasArray = json_decode($datas, true);

  $data['successCardio'] = $controllerAjax->updateClientCardio($datasArray);  

  echo json_encode($data);
}

// UPDATE PROGRAM-CLIENT-MUSCULATION-UN-EXERCICE
if(isset($data['req']) && $data['req'] === 'updateClientMusculation') {
  $datas = str_replace('\\',"",$data['datas']);
  unset($data['datas']);
  $datasArray = json_decode($datas, true);

  $data['successMusculation'] = $controllerAjax->updateClientMusculation($datasArray);  

  echo json_encode($data);
}

// UPDATE PROGRAM-CLIENT-ABDOS-UN-EXERCICE
if(isset($data['req']) && $data['req'] === 'updateClientAbdos') {
  $datas = str_replace('\\',"",$data['datas']);
  unset($data['datas']);
  $datasArray = json_decode($datas, true);

  $data['successAbdos'] = $controllerAjax->updateClientAbdos($datasArray);  

  echo json_encode($data);
}

// UPDATE PROGRAM-CLIENT-FESSIERS-UN-EXERCICE
if(isset($data['req']) && $data['req'] === 'updateClientFessiers') {
  $datas = str_replace('\\',"",$data['datas']);
  unset($data['datas']);
  $datasArray = json_decode($datas, true);

  $data['successFessiers'] = $controllerAjax->updateClientFessiers($datasArray);  

  echo json_encode($data);
}
