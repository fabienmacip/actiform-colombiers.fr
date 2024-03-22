<!-- <nav class="navbar navbar-light bg-light navbar-expand-lg" style="--bs-scroll-height: 10rem;"> -->
<nav class="navbar navbar-light navbar-expand-lg" style="--bs-scroll-height: 10rem;">
      <div class="container-fluid">
      
      <!-- ADDED -->
      <button id="navbar-toggler-button" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
      </button>
      <!-- FIN ADDED -->

            <!-- <ul class="navbar-nav navbar-nav-scroll"> -->
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul id="nav-ul" class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item"><a href="index.php?page=accueil" class="nav-link">Accueil</a></li>
                
<!--                 <li class="nav-item relative" id="nav-nos-references">
                    <a href="#" class="nav-link" id="nos-references-link">Nos r&eacute;f&eacute;rences</a>
                    <ul id="sub-nav-univers" class="absolute">
                      <li><a href="index.php?page=univers&univid=all">TOUTES</a></li>
                      <li class="nav-sub-menu-separator">&nbsp;</li>
                        <li><a href="index.php?page=univers&univid=3">Acheter mon logement</a></li>
                        <li><a href="index.php?page=univers&univid=6">Assurance</a></li>
                        <li><a href="index.php?page=univers&univid=4">Construire ma maison</a></li>
                        <li><a href="index.php?page=univers&univid=2">Copropri&eacute;t&eacute;</a></li>
                        <li><a href="index.php?page=univers&univid=5">Cr&eacute;dit</a></li>
                        <li><a href="index.php?page=univers&univid=1">Travaux</a></li>
                    </ul>
                </li>
 -->
                <li class="nav-item"><a href="index.php?page=seance-decouverte" class="nav-link">S&eacute;ance D&eacute;couverte</a></li>

                <li class="nav-item"><a href="index.php?page=offres-avantages" class="nav-link">Offres & Avantages</a></li>

                <li class="nav-item"><a href="index.php?page=planning-reservations" class="nav-link">Planning & R&eacute;servations</a></li>

                <li class="nav-item"><a href="index.php?page=temoignages" class="nav-link">T&eacute;moignages</a></li>
                <li class="nav-item"><a href="index.php?page=partenaires" class="nav-link">Partenaires</a></li>

                <li class="nav-item"><a href="index.php?page=contact-horaires" class="nav-link">Contact & Horaires</a></li>


            </ul>


            <div id="connect-icon">
    
<?php 
        if(isset($_SESSION['userid']) && $_SESSION['userid'] > 0) {?>
          <a href="index.php?page=dashboard">
            <img src="img/icones/dashboard.png" alt="dashboard" class="contacts-icon" id="dashboard-img">
          </a>
          <a href="index.php?page=deconnexion">
            <i id="connect-icon-disconnect" class="fa-regular fa-user"></i>
<?php   } else { ?>
          <a href="index.php?page=connect">
            <i id="connect-icon-connect" class="fa-regular fa-user"></i>
<?php   }
?>



                </a>
            </div>
            <div id="facebook-icon">
                    <a href="https://www.facebook.com/actiform.fr" alt="actiform sur facebook" target="_blank">
                        <img
                            id="facebook-img"
                            class="contacts-icon"
                            src="img/icones/facebook2.svg"
                            alt="facebook"
                        >
                    </a>
            </div>
            <div id="instagram-icon">
                    <a href="https://www.instagram.com/actiformcolombiers34/" alt="actiform sur instagram" target="_blank">
                        <img
                            id="instagram-img"
                            class="contacts-icon"
                            src="img/icones/instagram2.svg"
                            alt="instagram"
                        >
                    </a>
            </div>
            <!-- ADDED -->
        </div>
        <!-- FIN ADDED -->
    </div>
    <!-- <div id="logo2-div">
        <img 
          id="logo2" 
          src="img/logo/logo-la-reference-350x311-transparent.png"
          class="logo-little-screen" 
          alt="La maison de l'habitat (by La Centrale de Financement) - Perpignan"
          >
    </div> -->

    </nav>