<?php
require_once('toaster/toaster-decouverte.php');
?>


<div id="decouverte-div">

    <h1>SEANCE DECOUVERTE</h1>
   
   <video controls autoplay muted loop poster="" width="400" height="" id="video-actiform" class="box brad-5">
        <source src="video/actiform.mp4" type="video/mp4">
        <!-- <source src="https://actiform-colombiers.fr/video/actiform.mp4" type="video/mp4"> -->

        Le fichier vidéo ne peut pas être lu.
   </video>
   <div id="div-form-decouverte">

       <p>
           Remplissez ce formulaire pour demander votre séance découverte. <br>
           Un coach vous appelle pour organiser votre séance personnalisée.
       </p>
   
       <form id="formShortMail" name="formShortMail" method="post" onSubmit="validFormRdv()" action="index.php?page=seance-decouverte">
           <div id="fsm-contact-donnees">
               <div id="fsm-contact-coordonnees">
                       
                        <div>
                           <label for="fsm-prenom"><span class="asterisque">*</span> Pr&eacute;nom<br>
                           <input type="text" id="fsm-prenom" name="fsm-prenom" maxlength="50" placeholder="votre pr&eacute;nom" tabindex="1"
                                  onblur="checkContactFormField('fsm-prenom')" oninput="checkContactFormField('fsm-prenom')"       
                           >
                           </label>
                           <div id="error-fsm-prenom" class="contact-form-error">Pr&eacute;nom : minimum 3 caract&egrave;res</div>
                        </div>
                        
                        <div>
                            <label for="fsm-tel"><span class="asterisque">*</span> Téléphone<br>
                            <input type="text" id="fsm-tel" name="fsm-tel" maxlength="10" placeholder="numéro à 10 chiffres ET sans espaces" tabindex="2"
                            onblur="checkContactFormField('fsm-tel')" oninput="checkContactFormField('fsm-tel')">
                        </label><br>
                        <div id="error-fsm-tel" class="contact-form-error">T&eacute;l&eacute;phone invalide ou vide</div>
                       </div>

                       <div>
                            <input type="checkbox" name="fsm-conditions" id="fsm-conditions" tabindex="3"
                            onclick="checkContactFormField('fsm-conditions')">
                            Mentions l&eacute;gales lues et accept&eacute;es. <span class="asterisque">*</span>
                       </div>

               </div>
      
               <div id="short-contact-btn">
                    <input type="hidden" name="decouverte-form-flag" id="decouverte-form-flag" value="flag">
                    <input class="button CTAButton shortMailButton" 
                        id="btn-annuler-short-mail" 
                        name="btn-annuler-short-mail" 
                        value="Annuler" 
                        tabindex="4" 
                        type="reset"
                        ><br>
   
                   <input class="button CTAButton shortMailButton btn-inactive" 
                        id="btn-envoyer-short-mail" 
                        name="btn-envoyer-short-mail" 
                        value="Envoyer" 
                        tabindex="5" 
                        type="submit"
                        disabled
                    >
               </div>	
           </div>
       </form>
   </div>
</div>