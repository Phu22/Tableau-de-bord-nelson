<?php 
//Utilisation du bottstrap twitter 
?>
<div class="container">
    <div class="row">
        <img src="./images/bandeau.png"></img>
        <?php  require_once 'vues/menuPrincipal.php';?>
        <div id="main-container">
            <div id="menugauche" class="span8">
                        <?php 
                        if(isset($_GET['choixMenuP'])){
                            if($_GET['choixMenuP']== 7){
                                require_once 'vues/menuVertical.php';   
                            }
                        }?>
            </div>
            <div id="graphiques" class="span8">
                <?php
                if(isset($_GET['choixMenuP'])){
                    if($_GET['choixMenuP']== 7){
                      require_once 'vues/graphiques.php'; 
                    }
                    if(isset ($_GET['touslescontrats'])){
                        if($_GET['touslescontrats'] == 1) {
                            require_once 'vues/lescontrats.php'; 
                        }
                    }
                }?>
            </div>
            <div id="about">
                <?php
                if($_GET['choixMenuP'] == 8){
                        // Inclure vue
                        include_once('vues/about.php');
                }
                ?>
            </div>
            <div id="bas">
                <?php require_once 'vues/bas.php';?>
            </div>
        </div>
    </div>
</div>


