<?php
	if(isset($_POST['decouverte-form-flag']) && 'flag' == $_POST['decouverte-form-flag']) {
		echo '<div id="toaster-decouverte-form" class="paragraphe-normal box relative"><div id="toaster-decouverte-form-cross" class="absolute" onclick="closeContactFormToaster()">X</div>Votre message a bien &eacute;t&eacute; envoy&eacute;.<br>Nous vous recontactons dès que possible.</div>';
		
		//$DESTINATAIRE = "r.durin@lacentraledefinancement.fr";
		$DESTINATAIRE = "louis.jdlfitness@gmail.com";
		$DESTINATAIRE_BCC = "fabien.macip@gmail.com";
        $mail = $DESTINATAIRE;
		

        $prenom = $_POST['fsm-prenom'] ?? '';
        $tel = $_POST['fsm-tel'] ?? '';

		$message = "Demande de séance découverte depuis le site actiform-colombiers.fr\n\n";
		$message .= "Prénom : ".$prenom."\n\n";
		$message .= "Téléphone : ".$tel."\n\n";
    
        //ICI, AJOUTER fonction dans services/mailEngine.php pour createMail

        $dest = $DESTINATAIRE;
        $sujet = "Message depuis le site ACTIFORM-COLOMBIERS.FR de la part de ".$prenom.".";
        $corp = "\n".$message."\n";

        $fromOK = 'mail_php@actiform-colombiers.fr';

        $headers  = array(

            'MIME-Version' => '1.0',
            'From' => $fromOK,
            'Reply-To' => ''.$mail,
            'Bcc' => $DESTINATAIRE_BCC,
            'Content-Type' => ' text/plain; charset="utf-8"; DelSp="Yes"; format=flowed ; ',
            'Content-Disposition' => ' inline',
            'Content-Transfer-Encoding' => ' 7bit',
            'X-Envelope-From' => ' <'.$mail.'>',
            'X-Mailer' => 'PHP/'.phpversion()
        );

        if (mail($dest, $sujet, $corp, $headers)) {
        //echo "Email envoyé avec succès à $dest ...";
        } else {
        //echo "Échec de l'envoi de l'email...";
        }

}

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
                            <input type="checkbox" name="fsm-conditions" id="fsm-conditions"
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