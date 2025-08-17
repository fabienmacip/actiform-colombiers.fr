<div id="temoignages-div">
    <h1>TEMOIGNAGES</h1>

    <?php
        function calculAnterioriteAvis($dateAvis){
            $dateObj = new DateTime($dateAvis);
            $today = new DateTime('now');
            
            $difference = $dateObj->diff($today);
            
            $resultat = '';

            // Ajouter les années si elles sont présentes
            if ($difference->y > 0) {
                $resultat .= $difference->y . ' an(s) ';
            }

            // Ajouter les mois si ils sont présents
            if ($difference->m > 0) {
                $resultat .= $difference->m . ' mois ';
            }

            // Ajouter les jours si ils sont présents
/*             if ($difference->d > 0) {
                $resultat .= $difference->d . ' jour(s) ';
            }
 */
            return $resultat;

        }
    ?>
    <div id="temoignages-section">

    <div class="avis-google"> 
            <div>
                <div>
                    <img 
                            class="avis-img" 
                            alt="avatar-avis" 
                            src="img/temoignages/07.png"
                    >
                </div>    
                <div>
                    <span class="avis-auteur">Puls'Art Piercing Iris Tattoo</span>
                    <span class="avis-nb">15 avis</span>
                </div>
            </div>
            <div>
                <div>
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                </div>
                <div>
                    il y a <?= calculAnterioriteAvis("2025-04-15") ?>
                </div>
            </div>
            <div>
                <div>
                Super salle, bonne ambiance je recommande vivement
                </div>
                <div>
                    Visit&eacute; en avril 2025
                </div>
            </div>
        </div>
        <div class="avis-google"> 
            <div>
                <div>
                    <img 
                            class="avis-img" 
                            alt="avatar-avis" 
                            src="img/temoignages/08.png"
                    >
                </div>    
                <div>
                    <span class="avis-auteur">Marilyn MOURNET</span>
                    <span class="avis-nb">1 avis</span>
                </div>
            </div>
            <div>
                <div>
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                </div>
                <div>
                    il y a <?= calculAnterioriteAvis("2024-11-10") ?>
                </div>
            </div>
            <div>
                <div>
                    Salle de sport très conviviale et décontractée. Je suis inscrite depuis bientot 2 ans. Rien à voir avec les grosses chaînes de salle de sport.<br>
                    Louis nous accueille toujours avec le sourire et reste disponible pour nous accompagner.<br>
                    Matériel bien entretenu et de qualité.<br>
                    Pour ma part je ne vais pas aux cours collectifs mais j'ai eu de bons retours.
                </div>
                <div>
                    Visit&eacute; en novembre 2024
                </div>
            </div>
        </div>
        <div class="avis-google"> 
            <div>
                <div>
                    <img 
                            class="avis-img" 
                            alt="avatar-avis" 
                            src="img/temoignages/09.png"
                    >
                </div>    
                <div>
                    <span class="avis-auteur">Martine Cabie</span>
                    <span class="avis-nb">12 avis</span>
                </div>
            </div>
            <div>
                <div>
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                </div>
                <div>
                    il y a <?= calculAnterioriteAvis("2024-04-25") ?>
                </div>
            </div>
            <div>
                <div>
                Salle de sport pro, conviviale et cours hypers variés.<br>
                Les coachs sont efficaces, rigoureux et très sympas.<br>
                Concernant le patron, il est doté d'une humeur incroyable. 
                Toujours le sourire et le peps. Mais ne vous y méprenez pas, 
                c'est pas parce que l'ambiance est décontractée, qu'on oublie de bosser. Tout au contraire !<br>
                Venez essayer, vous verrez par vous même. 😜
                </div>
                <div>
                    Visit&eacute; en avril 2024
                </div>
            </div>
        </div>


        <div class="avis-google"> 
            <div>
                <div>
                    <img 
                            class="avis-img" 
                            alt="avatar-avis" 
                            src="img/temoignages/01.png"
                    >
                </div>    
                <div>
                    <span class="avis-auteur">Tanguy Murillo</span>
                    <span class="avis-nb">3 avis</span>
                </div>
            </div>
            <div>
                <div>
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                </div>
                <div>
                    il y a <?= calculAnterioriteAvis("2023-08-01") ?>
                </div>
            </div>
            <div>
                <div>
                    Personnel très accueillant, salle bien équipée avec tout ce qu'il faut pour atteindre ses objectifs. 
                    Les cours collectifs sont variés et ouvert pour tous les niveaux également. Je recommande ! :)
                </div>
                <div>
                    Visit&eacute; en ao&ucirc;t 2023
                </div>
            </div>
        </div>
        
        <div class="avis-google"> 
            <div>
                <div>
                    <img 
                            class="avis-img" 
                            alt="avatar-avis" 
                            src="img/temoignages/02.png"
                    >
                </div>    
                <div>
                    <span class="avis-auteur">AERO CONSULTING Formations Aéronautiques</span>
                    <span class="avis-nb">262 avis</span>
                </div>
            </div>
            <div>
                <div>
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                </div>
                <div>
                    il y a <?= calculAnterioriteAvis("2023-09-01") ?>
                </div>
            </div>
            <div>
                <div>
                Super salle de sport qui propose diverses activités. On y trouve un grand nombre de machines variées. 
                Les professeurs sont compétents et sympathiques.<br>
                Je recommande !<br>
                La nouvelle direction est aussi sympathique et impliquée que l'ancienne.
                </div>
                <div>
                    Visit&eacute; en ao&ucirc;t 2023
                </div>
            </div>
        </div>
    
        <div class="avis-google"> 
            <div>
                <div>
                    <img 
                            class="avis-img" 
                            alt="avatar-avis" 
                            src="img/temoignages/03.png"
                    >
                </div>    
                <div>
                    <span class="avis-auteur">sylvie nedellec</span>
                    <span class="avis-nb">2 avis</span>
                </div>
            </div>
            <div>
                <div>
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                </div>
                <div>
                    il y a <?= calculAnterioriteAvis("2023-04-15") ?>
                </div>
            </div>
            <div>
                <div>
                J'aime tout dans cette salle de sport...la musculation, le cardio et les toilettes qui 
                sont d'une propreté irréprochable. Toute l'équipe est super...
                </div>
                <div>
                    Visit&eacute; en avril 2023
                </div>
            </div>
        </div>
    
        <div class="avis-google"> 
            <div>
                <div>
                    <img 
                            class="avis-img" 
                            alt="avatar-avis" 
                            src="img/temoignages/04.png"
                    >
                </div>    
                <div>
                    <span class="avis-auteur">Chrystele Moi</span>
                    <span class="avis-nb">5 avis · 6 photos</span>
                </div>
            </div>
            <div>
                <div>
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                </div>
                <div>
                    il y a <?= calculAnterioriteAvis("2023-09-01") ?>
                </div>
            </div>
            <div>
                <div>
                    Super salle supers profs c’est le top 👍 … 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div>
                    Visit&eacute; en septembre 2023
                </div>
            </div>
        </div>

        <div class="avis-google"> 
            <div>
                <div>
                    <img 
                            class="avis-img" 
                            alt="avatar-avis" 
                            src="img/temoignages/05.png"
                    >
                </div>    
                <div>
                    <span class="avis-auteur">MARTIN Marie-Claire</span>
                    <span class="avis-nb">54 avis · 11 photos</span>
                </div>
            </div>
            <div>
                <div>
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                </div>
                <div>
                    il y a <?= calculAnterioriteAvis("2023-05-01") ?>
                </div>
            </div>
            <div>
                <div>
                Salle de sport au top,  ambiance familiale sans prise de tête.<br>
                Nombreux cours et coatchs au top<br>
                Je recommande vraiment
                </div>
                <div>
                    Visit&eacute; en mai 2023
                </div>
            </div>
        </div>

        <div class="avis-google"> 
            <div>
                <div>
                    <img 
                            class="avis-img" 
                            alt="avatar-avis" 
                            src="img/temoignages/06.png"
                    >
                </div>    
                <div>
                    <span class="avis-auteur">Yoyo.</span>
                    <span class="avis-nb">1 avis</span>
                </div>
            </div>
            <div>
                <div>
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                    <img
                        class="avis-etoile"
                        alt="etoile"
                        src="img/icones/etoile-ok.png"
                    >
                </div>
                <div>
                    il y a <?= calculAnterioriteAvis("2023-12-01") ?>
                </div>
            </div>
            <div>
                <div>
                    Top top du top y’a rien à dire après pratiquement 2 ans chez actiform 👍🏼 …
                </div>
                <div>
                    Visit&eacute; en d&eacute;cembre 2023
                </div>
            </div>
        </div>


    </div>

</div>