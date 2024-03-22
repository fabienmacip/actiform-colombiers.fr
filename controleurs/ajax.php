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

}

$controllerAjax = new ControleurAjax($pdo);

// CREATE CLIENT
if($data['req'] === 'add' && $data['table'] === 'client') {
  $data['success'] = $controllerAjax->createClient($data['prenom'],$data['nom'],$data['mail']);
  echo json_encode($data);
  return;
}

// UPDATE CLIENT
if($data['req'] === 'update' && $data['table'] === 'client') {
  $data['success'] = $controllerAjax->updateClient(intval($data['id']),$data['nom'],$data['prenom'],$data['mail']);
  echo json_encode($data);
  return;
}

// DELETE CLIENT
if($data['req'] === 'delete' && $data['table'] === 'client' && $data['id'] <> '' && intval($data['id']) > 0) {
  $data['success'] = $controllerAjax->deleteClient(intval($data['id']));
  echo json_encode($data);
  return;
}


