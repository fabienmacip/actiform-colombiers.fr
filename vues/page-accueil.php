<?php

$titre = 'ACTIFORM COLOMBIERS';

ob_start();
?>



<div class="m-0 max-width-100vw">
  <div id="image-accueil" class="box"></div>
  <div class="row max-width-100percent jcc wrap" id="accueil-text-boxes">
    
    <div class="accueil-text-boxes" id="accueil-sport-plaisir">
      <h2>Le sport plaisir</h2>
      <p>
        <b>Ouverture</b><br>
        7 jours sur 7 !<br>
        De 06h00 à 23h00.
      </p>
      <p>
        <b>Accueil</b><br>
        Lundi &agrave; vendredi - 09h/21h<br>
        Samedi - 10h/14h
      </p>      
      <p>
        <b>Adresse</b><br>
        Z.A. Viargues<br>
        Colombiers (34440).
      </p>
    </div>

    <div class="accueil-text-boxes">
      <h2>18 activit&eacute;s sportives</h2>
      <p>
        <div id="liste-activites-sportives">
          <div>Acti Attack</div>
          <div>Acti Combat</div>
          <div>Acti Pump</div>
          <div>Acti Ring</div>
          <div>Bike</div>
          <div>Body Sculpt</div>
          <div>C.A.F.</div>
          <div>Cross Training</div>
          <div>Cross Training HIIT</div>
          <div>Full Body</div>
          <div>Gym Douce</div>
          <div>HIIT-AF</div>
          <div>Pilates</div>
          <div>Step</div>
          <div>Strech</div>
          <div>Strong</div>
          <div>Swiss Ball</div>
          <div>Zumba</div>
        </div>
      </p>
    </div>

    <div class="accueil-text-boxes" id="div-qui-sommes-nous">
      <h2>Qui sommes-nous ?</h2>
      <p>
        <h3>
            Une &eacute;quipe exp&eacute;riment&eacute;e
        </h3>
        Lorem ipsum dolor sit amet consectetur adipisicing edivt. Facilis totam corporis laborum, similique quaerat fugit facere sapiente amet rerum nobis tenetur sit incidunt, sed natus quos reiciendis commodi eveniet vero!
      </p>
      <div id="qui-sommes-nous-visages">
        <div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam aspernatur vel, itaque inventore iure magnam eveniet nesciunt tenetur magni reiciendis dignissimos, error, esse iusto recusandae omnis suscipit sit deleniti nihil.</div>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum neque laudantium minus tempore ullam odit explicabo at quia alias iste voluptates eligendi maiores eveniet beatae, debitis harum nulla aut sapiente.</div>
      </div>
    </div>


  </div>
</div>


<?php
$contenu = ob_get_clean();
require_once('layout.php');