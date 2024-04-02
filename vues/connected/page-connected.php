<div id="page-connected">
  <h1>Tableau de bord</h1>

  <?php if(isset($administrateurToUpdate) && $administrateurToUpdate <> '') {
    echo '<div id="messagePasswordUpdated">'.$administrateurToUpdate.'</div>';
  }
  ?>

  <?php
  // Affichage du DASHBOARD
  if (isset($_SESSION['admin']) && $_SESSION['admin'] > 0) {
  // ADMIN : ROLE == 1
  // CLIENT : ROLE == 2
  ?>

  <div id="dashboard-tabs">
    
    <?php if($_SESSION['role'] == 1) {?>
      <div class="dashboard-tab-title dashboard-tab-title-active dashboard-link" id="dashboard-link-programs" onclick="displayPrograms()">
        Programmes
      </div>
    <?php } ?>
    <?php if($_SESSION['role'] == 2) {
      $theToken = $_SESSION['token']; 
      $theClientId = $_SESSION['userid']  ;
    ?>
      <div class="dashboard-tab-title dashboard-tab-title-active dashboard-link" id="dashboard-link-programs" onclick="displayPrograms('<?= $theClientId ?>', '<?= $theToken ?>')">
        Mon programme
      </div>
    <?php } ?>
    <?php if($_SESSION['role'] == 1) {?>
    <div class="dashboard-tab-title dashboard-link" id="dashboard-link-clients" onclick="displayClients()">
      Clients
    </div>
    <?php } ?>
    <div class="dashboard-tab-title dashboard-link" id="dashboard-link-password" onclick="displayPasswordUpdate()">
        Mon mot de passe
    </div>
  </div>

  <!-- DIV masquées par défaut, sauf la 1ère au démarrage -->
  <div class="dashboard-tab-content dashboard-tab-content-active" id="dashboard-tab-programs">
    <?php require_once('managePrograms.php'); ?>
  </div>
  <div class="dashboard-tab-content dashboard-tab-content-inactive" id="dashboard-tab-clients">
    <?php require_once('manageClients.php'); ?>
  </div>
  <div class="dashboard-tab-content dashboard-tab-content-inactive" id="dashboard-tab-password">
    <?php require_once('passwordModify.php'); ?>
  </div>

</div>
  
  <?php } ?>


</div>

