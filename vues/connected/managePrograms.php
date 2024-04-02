<?php $manageProgramsTitle = $_SESSION['role'] == 1 ? "GESTION DES PROGRAMMES" : "MON PROGRAMME"; ?>

<h2 id="mon-program-title"><?= $manageProgramsTitle; ?></h2>
<?php if($_SESSION['role'] == 1) {?>
<div id="div-choose-clients">

  <form id="form-choose-client">
    Chercher un <b>client</b> par son <u>pr&eacute;nom</u>, son <u>nom</u> ou son <u>adresse mail</u> :<br>
    <input type="text" id="client-search" name="client-search" placeholder="Chercher un client...">
    <input type='hidden' name='token' id='client-search-token' value='<?= $_SESSION['token'] ?>'>
    <div id="search-menu-container"></div>
  </form>
</div>
<?php } ?>

<?php if($_SESSION['role'] == 2) {?>
  <div id="program-prenom-nom" class="tc box"><?= $_SESSION['prenom']; ?> <?= $_SESSION['nom']; ?></div>
  <div id="btn-1seance-only">
    <button onclick="displayOnly1Seance('1')">S&eacute;ance 1</button>
    <button onclick="displayOnly1Seance('2')">S&eacute;ance 2</button>
    <button onclick="displayOnly1Seance('3')">S&eacute;ance 3</button>
    <button onclick="displayOnly1Seance('4')">S&eacute;ance 4</button>
    <button onclick="displayOnly1Seance('0')">Tout</button>
  </div>
<?php } ?>
<div id="div-display-programs">
  
  <div id="div-program-cardio">

  </div>
  <div id="div-program-musculation">
    
  </div>
  <div id="div-program-abdos">

  </div>
  <div id="div-program-fessiers">

  </div>

</div>