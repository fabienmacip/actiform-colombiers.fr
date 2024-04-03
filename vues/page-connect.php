<div id="connect-div">

  <div>
    <a href="index.php" id="back-home-from-ml" rel="accueil" class="link-to-home">&lt;&lt;&lt; accueil</a>
  </div>
  <div>      
    <h1>CONNEXION</h1>
      <div id="connexion-div">

      <?php if(isset($messageConnexionError) && $messageConnexionError !== '') {?>
          <div id="messageConnexionError"><?= $messageConnexionError; ?></div>
      <?php } ?>

      <div id="connexion-form" class="">
          <form method="post" id="form-connexion" onSubmit="validFormConnexion()" action="index.php" class="p-4 mx-auto flex flex-column aic">

              <div class="mb-4">
                  <label for="mail" class="form-label">Login</label><br>
                  <input type="email" name="connect-email" maxlength="50" id="connect-email" placeholder="Saisissez votre adresse mail" tabindex="1"
                          onblur="checkConnexionFormField('connect-email')" oninput="checkConnexionFormField('connect-email')"><br>
                  <span id="emailHelpInline" class="form-text">Adresse mail, maximum 50 caractères.</span>
                  <div id="error-connect-email" class="connexion-form-error">Merci d'entrer une adresse mail valide</div>
              </div>

              <div class="mb-4">
                <div id="connect-password">
                    <label for="password" class="form-label">Mot de passe</label><br>
                    <input type="password" name="connect-passw" minlength="8" maxlength="40" id="connect-passw" placeholder="Saisissez votre mot de passe" tabindex="2"
                    onblur="checkConnexionFormField('connect-passw')" oninput="checkConnexionFormField('connect-passw')">
                    <img src="img/icones/eye.png" alt="voir" id="toggle-display-password" style="width:25px; cursor:pointer;" onclick="toggleDisplayPassword()">
                    <br>
                </div>
                  <span id="passwordHelpInline" class="form-text">Entre 8 et 40 caractères.</span>
                  <div id="error-connect-passw" class="connexion-form-error">Minimum 8 caractères</div>
              </div>

              <input type="hidden" name="action" id="action" value="connexion">
              
              <div id="connexion-form-buttons" class="flex">
                  <button type="reset" class="button CTAButton" tabindex="3">Reset</button>
                  <button type="submit" class="button CTAButton btn-inactive" disabled tabindex="4" id="btn-connexion">Envoyer</button>
              </div>

          </form>
      </div>
  </div>
  </div>
</div>

