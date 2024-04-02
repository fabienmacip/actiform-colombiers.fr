<div id="password-modify-div">
    <h1>Modifier votre mot de passe</h1>
    <div id="password-form" class="box">
        <form method="post" id="form-password" action="index.php" class="p-4 mx-auto">
          <!-- validFormConnexion -->

            <div class="mb-4">
            <label for="password" class="form-label">Mot de passe</label><br>
                <input type="text" name="password-passw" minlength="8" maxlength="40" id="password-passw" placeholder="Saisissez votre mot de passe" tabindex="11"
                onblur="checkPasswordFormField('password-passw')" oninput="checkPasswordFormField('password-passw')"><br>
                <span id="passwordHelpInline" class="form-text">Entre 8 et 40 caractères.</span>
                <div id="error-password-passw" class="password-form-error">Minimum 8 caractères</div>
                <div id="error2-password-passw" class="password-form-error">Les 2 mots de passe doivent &ecirc;tre identiques</div>
            </div>
            <!-- checkConnexionFormField('connect-passw') -->
            <div class="mb-4">
                <label for="password2" class="form-label">Mot de passe (confirmer)</label><br>
                <input type="text" name="password-passw2" minlength="8" maxlength="40" id="password-passw2" placeholder="Saisissez à nouveau votre mot de passe" tabindex="12"
                onblur="checkPasswordFormField('password-passw2')" oninput="checkPasswordFormField('password-passw2')"><br>
                <span id="passwordHelpInline2" class="form-text">Entre 8 et 40 caractères.</span>
                <div id="error-password-passw2" class="password-form-error">Minimum 8 caractères et identique</div>
                <div id="error2-password-passw2" class="password-form-error">Les 2 mots de passe doivent &ecirc;tre identiques</div>
            </div>

            <?php $titi = $_SESSION['admin'];
             ?>
            <input type="hidden" name="token" id="token" value="<?= $_SESSION['token']; ?>">
            <input type="hidden" name="userid" id="userid" value="<?= $_SESSION['userid']; ?>">
            <input type="hidden" name="action" id="action" value="passwordUpdate">
            
            <div id="password-form-buttons">
                <button type="reset" class="button CTAButton" tabindex="13">Reset</button>
                <button type="button" class="button CTAButton btn-inactive" disabled tabindex="14" id="btn-password-update" onclick="confirmPasswordUpdate()">Envoyer</button>
            </div>

        </form>
    </div>
</div>