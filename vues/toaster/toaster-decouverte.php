<?php
	if(isset($_POST['decouverte-form-flag']) && 'flag' == $_POST['decouverte-form-flag']) {
		echo '<div id="toaster-decouverte-form" class="paragraphe-normal box relative">';
        echo '<div id="toaster-decouverte-form-cross" class="absolute" onclick="closeContactFormToaster()">X</div>';
        echo 'Votre demande de s&eacute;ance de d&eacute;couverte a bien &eacute;t&eacute; envoy&eacute;e.<br>Nous vous recontactons dès que possible.</div>';
		
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



