<?php //Menu gauche accordeon ?>
<div class="accordion" id="leftMenu">
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseTwo">
            Projets en cours  <i class="glyphicon glyphicon-chevron-down"></i>
            </a>
        </div>
        <div id="collapseTwo" class="accordion-body collapse" style="height: 0px; ">
            <div class="accordion-inner">
                <?php
                //$projetencours
                if(isset($projetencours)){
                    foreach ($projetencours as $projet) {
                        echo '<a href="index.php?choixMenuP=7&projet='.$projet['id'].'">- '.$projet['intitule'].'</a></br>';
                    }

                }
                ?>
            </div>
        </div>
    </div>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseThree">
            Contrats en cours<i class="glyphicon glyphicon-chevron-down"></i>
            </a>
        </div>
        <div id="collapseThree" class="accordion-body collapse" style="height: 0px; ">
            <div class="accordion-inner">
                <?php
                //$contrat en cours
                if(isset($contratencours)){
                    foreach ($contratencours as $contrat) {
                        echo '<a href="index.php?choixMenuP=7&contrat='.$contrat[0].'">'.$contrat[0].'</a></br>';   
                    }
                }
                ?>              
            </div>
         </div>
    </div>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-parent="#leftMenu" href="index.php?choixMenuP=7&touslescontrats=1">
            Tous les contrats
            </a>
         </div>
        </div>
</div>
