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

class ControleurAjax {
  use Modele;

  public function createClient($prenom, $nom, $mail, $pwd = 'totototo') {
    $administrateurs = new Administrateurs($this->pdo);
    return $administrateurs->create($nom, $prenom, $mail, $pwd);
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

}

$controllerAjax = new ControleurAjax($pdo);

// CREATE CLIENT
if(isset($data['req']) && $data['req'] === 'add' && $data['table'] === 'client') {
  $data['success'] = $controllerAjax->createClient($data['prenom'],$data['nom'],$data['mail']);
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
  $titi = $controllerAjax->searchClients($_GET['search']);
  $data['success'] = $request !== '' && count($request) > 0;
  
  $resultHTML = '';
  if(!empty($request) && count($request) > 0) {
    $resultHTML .= "<div id='search-menu'>";

    foreach($request as $response) {
      $resultHTML .= "<a class='search-menu-item' onclick='clientChosenForProgram(".$response->getId().",\"".$response->getPrenom()."\",\"".$response->getNom()."\",\"".$response->getMail()."\")'>";
      $resultHTML .= $response->getPrenom()." ".$response->getNom()." ".$response->getMail()."</a>";
    };

    $resultHTML .= "</div>";
  } else {
    $resultHTML .= "<div id='search-menu'>Aucun r&eacute;sultat...</div>";
  }

  $data['result'] = $resultHTML;

  echo json_encode($data);
}