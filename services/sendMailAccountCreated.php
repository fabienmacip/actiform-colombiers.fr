<?php

  $DESTINATAIRE = $mail;
  //$DESTINATAIRE = "louis.jdlfitness@gmail.com";
  $DESTINATAIRE_BCC = "louis.jdlfitness@gmail.com";
  //$DESTINATAIRE_BCC = "fabien.macip@gmail.com";
      $mail = $DESTINATAIRE;

  $message = "Vous avez été inscrit sur le site actiform-colombiers.fr\n\n";
  $message .= "Vous pouvez vous connecter directement ici : \nhttps://actiform-colombiers.fr/index.php?page=connect";
  $message .= "Prénom : ".$prenom."\n\n";
  $message .= "Nom : ".$nom."\n\n";
  $message .= "Adresse mail (utilisée pour vous connecter au site) : ".$mail."\n\n";
  $message .= "Mot de passe (à changer dès que possible) : ".$pwd."\n\n";
  
      //ICI, AJOUTER fonction dans services/mailEngine.php pour createMail

      $dest = $DESTINATAIRE;
      $sujet = "Inscription sur le site ACTIFORM-COLOMBIERS.FR pour accéder à votre programme de fitness personnalisé.";
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
