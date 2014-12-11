<?php
//Affichage des donnés et graphiques du projet selectionnées
if(isset($info_projet)){
    //Affichage du nom du projet
    echo "<p class='titre'>".$info_projet[1]."</p>";
    
    //Afichage des infos générales du projet sur le projet 
    echo "<div id='info-generales'>";
        echo "Numéro du projet : ". $info_projet[0]. "</br>";
        echo "Dates de début prévue : ".$info_projet[3]."</br>";
        echo "Date de fin prévue : ".$info_projet[4]."</br>";
        echo "Date de début réelle : ".$info_projet[5]."</br>";
    echo "</div>";
    ?>
    <table class='graph'>
        <tr>
            <td>
                <?php
                //Affichage du graphique du budget consomméés
                if(isset($heure_total_projet)){?>
                    <img src='conso_heures.jpg' alt='' class='histogramme'/>
                <?php } ?>
            </td>
            <td>
            <?php
            //Afichage du tableau du budget consommées
            if(isset($heure_total_projet, $heure_reel_projet , $heure_prevu_projet)){?>
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="4">Nombre d'heures consommées</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>Réel</td>
                            <td>Prévu</td>
                        </tr>
                        <tr>
                            <td><?php echo $heure_total_projet ?></td>
                            <td><?php echo $heure_reel_projet?></td>
                            <td><?php echo $heure_prevu_projet?></td>
                        </tr>
                    </table>
            <?php
                if($depassement_heures > 0){
                    echo "<div class='alert alert-image'> Dépassement : ".$depassement_heures." h";
                }
            }?>
            </td>
        </tr>
    </table>   
    <table class='graph'>
        <tr>
            <td>
                <?php
                //Affichage du graphique du budget consomméés
                if(isset($budget_prevu_projet)){?>
                    <img src='conso_budget.jpg' alt='' class='histogramme'/>
                <?php } ?>
            </td>
            <td>
            <?php
            //Afichage du tableau du budget consommées
            if(isset($budget_total_projet, $budget_reelle_projet , $budget_prevu_projet)){?>
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="4">Budget Consommé</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>Réel</td>
                            <td>Prévu</td>
                        </tr>
                        <tr>
                            <td><?php echo $budget_total_projet ?></td>
                            <td><?php echo $budget_reelle_projet?></td>
                            <td><?php echo $budget_prevu_projet?></td>
                        </tr>
                    </table>
            <?php
                if($depassement_budget_projet > 0){
                    echo "<div class='alert alert-image'> Dépassement : ".$depassement_budget_projet." €";
                }
            }?>
            </td>
        </tr>
    </table>
    <table class='graph'>
        <tr>
            <td>
                <?php
                //Affichage du graphique des delais
                if(isset($duree_totale_projet)){?>
                    <img src='conso_delais.jpg' alt='' class='histogramme'/>
                <?php } ?>
            </td>
            <td>
            <?php
            //Afichage du tableau du budget consommées
            if(isset($duree_totale_projet, $duree_reelle_projet , $duree_prevu_projet)){?>
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="4">Delais du projet</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>Réel</td>
                            <td>Prévu</td>
                        </tr>
                        <tr>
                            <td><?php echo $duree_totale_projet ?></td>
                            <td><?php echo $duree_reelle_projet?></td>
                            <td><?php echo $duree_prevu_projet?></td>
                        </tr>
                    </table>
            <?php
                if($depassement_delais > 0){
                    echo "<div class='alert alert-image'> Retard : ".$depassement_delais." jours";
                }
            }?>
            </td>
        </tr>
    </table>
<?php            
}

//Affichage des infos pour les contrat
if(isset($info_contrat)){
    //Affichage de l'id du contrat
    echo "<p class='titre'>Contrat N°".$info_contrat['id']."</p>";
    
    //Afichage des infos générales du projet sur le projet 
    echo "<div id='info-generales'>";
        echo "Numéro du contrat : ". $info_contrat['id']. "</br>";
        echo "Dates de début de contrat : ".$info_contrat['dateDebut']."</br>";
        echo "Nom de l'application : ".$info_contrat['nom']."</br>";
        echo "Raison sociale du client : ".$info_contrat['raisonSociale']."</br>";
    echo "</div>";
    //Affichage du tableau du budget du contrat
    if(isset($montant_total_contrat , $montant_reel_contrat, $montant_prevu_contrat)){?>
            <table>
                <tr>
                    <td>
                        <img src='budget_contrat.jpg' alt='' class='histogramme'/>
                    </td>
                    <td>
                       <table class="table table-bordered">
                            <tr>
                                <td colspan="4">Consommation budget du contrat</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>Réel</td>
                                <td>Prévu</td>
                            </tr>
                            <tr>
                                <td><?php echo $montant_total_contrat ?></td>
                                <td><?php echo $montant_reel_contrat ?></td>
                                <td><?php echo $montant_prevu_contrat ?></td>
                            </tr>
                            <?php
                            if($depassement_budget_contrat > 0){
                                echo "<div class='alert alert-image'> Retard : ".$depassement_budget_contrat." €";
                            }?>
                        </table> 
                    </td>
                </tr>
            </table>
    <?php
    }
}
?>
