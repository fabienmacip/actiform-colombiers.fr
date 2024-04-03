<h1>GESTION DES CLIENTS</h1>
<div id="div-manage-clients">
  <div id="form-client-new">
    <form id="form-add-client" method="post" class="form-add-client-new">
      <div id="form-add-client-subtitle" class="form-client-input">
        NOUVEAU CLIENT
      </div>
      <div class="form-client-input">
        <label for="prenom">Pr&eacute;nom</label><br>
        <input type="text" id="prenom" name="prenom" tabindex="1" maxlength="40"
        onblur="checkClientFormFields()" oninput="checkClientFormFields()">
        <span id="prenom-error-message" class="client-form-error-message"><br>Le pr&eacute;nom doit contenir au moins 2 caract&egrave;res</span>
      </div>
      <div class="form-client-input">
        <label for="nom">Nom</label><br>
        <input type="text" id="nom" name="nom" tabindex="2" maxlength="40"
        onblur="checkClientFormFields()" oninput="checkClientFormFields()">
        <span id="nom-error-message" class="client-form-error-message"><br>Le nom doit contenir au moins 2 caract&egrave;res</span>
      </div>
      <div class="form-client-input">
        <label for="mail">Mail</label><br>
        <input type="email" id="mail" name="mail" tabindex="3" maxlength="50"
        onblur="checkClientFormFields()" oninput="checkClientFormFields()">
        <span id="mail-error-message" class="client-form-error-message"><br>Merci de fournir une adresse mail valide</span>
      </div>
      <input type="hidden" name="token" id="token" value="<?= $_SESSION['token']; ?>">
      <input type="hidden" name="userid" id="userid" value="<?= $_SESSION['userid']; ?>">
      <input type="hidden" name="action" id="action" value="clientUpdate">
      <input type="hidden" name="clientid" id="clientid" value="">
      <inpyt type="hidden" name="pwd" id="pwd" value="totototo">
  
      <div id="client-form-buttons">
        <button type="reset" class="button CTAButton" tabindex="5" onclick="emptyClientId()" id="btn-client-reset">Reset</button>
        <button type="button" class="button CTAButton btn-inactive" disabled tabindex="6" id="btn-client-update" onclick="confirmClientUpdate()">Envoyer</button>
      </div>
  
    </form>
  </div>
  <div id="clients-list">
    <table id="clients-list-table">
      <tr id="clients-list-table-first-row">
        <th>
          id
        </th>
        <th>
          Pr&eacute;nom
        </th>
        <th>
          Nom
        </th>
        <th>
          Mail
        </th>
        <th>
          &nbsp;
        </th>
        <th>
          &nbsp;
        </th>
      </tr>
    <?php 
      
      foreach($clients as $client) {
    ?>
      <tr id="cli-<?= $client->getId() ?>">
        <td>
          <?= $client->getId() ?>
        </td>
        <td>
          <?= $client->getPrenom() ?>
        </td>
        <td>
          <?= $client->getNom() ?>
        </td>
        <td>
          <?= $client->getMail() ?>
        </td>
        <td>
          <img img src="img/icones/modifier.png" 
               alt="Modifier"
               class="manage-client-icon"
               onclick="preFillClientForm('<?= $client->getId() ?>', '<?= $client->getPrenom() ?>', '<?= $client->getNom() ?>', '<?= $client->getMail() ?>')"
          >
        </td>
        <td>
          <img src="img/icones/supprimer.png" 
               alt="Supprimer"
               class="manage-client-icon"
               onclick="askConfirmDeleteClient('<?= $client->getId() ?>', '<?= $client->getPrenom() ?>', '<?= $client->getNom() ?>')"
          >
        </td>
      </tr>
    <?php
      }
    ?>
    </table>
  </div>
</div>