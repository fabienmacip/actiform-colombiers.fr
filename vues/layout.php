<!DOCTYPE html>
<html lang="fr">
<?php
    require_once("head.php");
?>
<body id="body">

<?php
    require_once("header.php");
?>

<section>

    <?php 
    require_once('nav.php');
    ?>

<?php 
    if(isset($_SESSION['userid']) && $_SESSION['userid'] > 0) {
        if(isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            echo "<div id='info-connected' class='bg-red'>Bonjour ".$_SESSION['prenom']." ".$_SESSION['nom'].", vous êtes connecté(e) en tant qu'<u>administrateur</u>.</div>";
        } else {
            echo "<div id='info-connected' class='bg-green'>Bonjour ".$_SESSION['prenom']." ".$_SESSION['nom'].", vous êtes connecté(e).</div>";
        }
    }    
?>


    <?= $contenu ?>
</section>

</main>
<!-- fw-light fst-italic fs-6 -->
<?php
    require_once('footer.php');
?>
<!-- ADDED -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- FIN ADDED -->

</body>
</html>