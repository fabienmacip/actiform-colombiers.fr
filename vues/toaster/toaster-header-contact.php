<?php

// Ce n'est pas un TOASTER, c'est simplement le fichier, calqué sur toaster-decouverte.php, qui permet de gérer l'envoi du mail.

	if(isset($_POST['header-contact-form-flag']) && 'flag' == $_POST['header-contact-form-flag']) {

        

		echo '<div id="toaster-header-contact-form" class="paragraphe-normal box relative">';
        echo '<div id="toaster-header-contact-form-cross" class="absolute" onclick="closeHeaderContactFormToaster()">X</div>';
        echo 'Votre message a bien &eacute;t&eacute; envoy&eacute;.<br>Nous vous recontactons dès que possible.</div>';
		
		// Debug: Show received data
		echo '<div style="background: #f0f0f0; padding: 10px; margin: 10px 0; border: 1px solid #ccc; font-family: monospace; font-size: 12px;">';
		echo '<strong>DEBUG - Données reçues:</strong><br>';
		echo 'firstName: "' . ($_POST['firstName'] ?? 'NON DÉFINI') . '"<br>';
		echo 'lastName: "' . ($_POST['lastName'] ?? 'NON DÉFINI') . '"<br>';
		echo 'email: "' . ($_POST['email'] ?? 'NON DÉFINI') . '"<br>';
		echo 'phone: "' . ($_POST['phone'] ?? 'NON DÉFINI') . '"<br>';
		echo 'flag: "' . ($_POST['header-contact-form-flag'] ?? 'NON DÉFINI') . '"<br>';
		echo '</div>';
		
		//$DESTINATAIRE = "fabien.macip@gmail.com";
		$DESTINATAIRE = "louis.jdlfitness@gmail.com";
		$DESTINATAIRE_BCC = "fabien.macip@gmail.com";
        $mail = $DESTINATAIRE;
		

        $firstName = $_POST['firstName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';

		$message = "Message de contact depuis le site actiform-colombiers.fr\n\n";
		$message .= "Prénom : ".$firstName."\n";
		$message .= "Nom : ".$lastName."\n";
		$message .= "Email : ".$email."\n";
		$message .= "Téléphone : ".$phone."\n\n";
    
		// Debug: Show received data
		echo '<div style="background: #f0f0f0; padding: 10px; margin: 10px 0; border: 1px solid #ccc; font-family: monospace; font-size: 12px;">';
		echo 'MESSAGE: "' . $message . '"<br>';
		echo '</div>';



        //ICI, AJOUTER fonction dans services/mailEngine.php pour createMail

        $dest = $DESTINATAIRE;
        $sujet = "Message de contact depuis le site ACTIFORM-COLOMBIERS.FR de la part de ".$firstName." ".$lastName.".";
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
            echo '<div style="background: #d4edda; color: #155724; padding: 5px; margin: 5px 0; border: 1px solid #c3e6cb; font-size: 12px;">✅ Email envoyé avec succès à ' . $dest . '</div>';
        } else {
            //echo "Échec de l'envoi de l'email...";
            echo '<div style="background: #f8d7da; color: #721c24; padding: 5px; margin: 5px 0; border: 1px solid #f5c6cb; font-size: 12px;">❌ Échec de l\'envoi de l\'email à ' . $dest . '</div>';
        }
	}
?> 