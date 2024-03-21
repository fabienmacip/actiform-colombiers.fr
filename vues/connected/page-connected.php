<div id="page-connected">
  <h1>Vous êtes connecté</h1>
  <div>
    Ici, vous pouvez modifier votre mot de passe et gérer les programmes de fitness.
  </div>

  <?php if(isset($administrateurToUpdate) && $administrateurToUpdate <> '') {
    echo '<div>'.$administrateurToUpdate.'</div>';
  }
  ?>


  <?php
  // Gestion des messages d'absence
  if (isset($_SESSION['admin']) && $_SESSION['admin'] > 0) {
    //require_once('messagesAbsence.php');
    require_once('passwordModify.php');
  }
  ?>
</div>

