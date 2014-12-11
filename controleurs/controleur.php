<?php
require_once 'modeles/accesDonnees.php';
require_once 'fonctions/fonctions.php';
require_once 'configs/param.php';
//ajout de jpgraph
require_once 'jpGraph/src/jpgraph.php';
require_once 'jpGraph/src/jpgraph_bar.php';
require_once 'jpGraph/src/jpgraph_line.php';

$idConnex = connexion($dsn, $user, $pass);

if(isset($_GET['choixMenuP'])){
    if($_GET['choixMenuP'] == 7){
        // Si nous sommes sur la page tableau de bord alors
        // $projetencours contient tous les projets en cours
        // $contratencours contient tous les contrats en cours
        $projetencours = projetencours($idConnex);
        $contratencours= contratencours($idConnex);
        
        //vue pour deboguer les fonctions de requete sql
        //require_once 'vues/test.php';
        if(isset($_GET['projet'])){
            // Info générale du projet
            $info_projet = info_projet($idConnex, $_GET['projet']);
            
            //Graphique heure consommées
            $heure_total_projet = heure_totalprojet($idConnex, $_GET['projet']);
            $heure_reel_projet = heuresrelles_projet($idConnex, $_GET['projet']);
            $heure_prevu_projet = heuresprevues_projet($idConnex, $_GET['projet']);
            //Tableau regroupant les valeurs d'heures
            $tableau_heure = array ($heure_total_projet , $heure_reel_projet , $heure_prevu_projet);
            
            //Graphique heure consommes
            creer_graphique_heures_consommees($tableau_heure);
            
            //Calcul depassement heures consommees
            $depassement_heures = $heure_reel_projet - $heure_prevu_projet;
            
            //Graphique bugjet consommées
            $budget_total_projet = budget_total_projet($idConnex, $_GET['projet']);
            $budget_reelle_projet = budget_reelle_projet($idConnex, $_GET['projet']);
            $budget_prevu_projet = budget_prevu_projet($idConnex, $_GET['projet']);
            
            //Tableau regroupant les valeurs du budget
            $tableau_budget_projet = array($budget_total_projet , $budget_reelle_projet , $budget_prevu_projet);
            
            //Graphique budget
            creer_graphique_budget($tableau_budget_projet);
            
            //Calcul depassement du budget consommées
            $depassement_budget_projet = $budget_reelle_projet - $budget_prevu_projet;
            
            //Graphique respect des délais
            $duree_totale_projet = dureetotale_projet($idConnex, $_GET['projet']);
            $duree_reelle_projet = dureereelle_projet($idConnex, $_GET['projet']);
            $duree_prevu_projet = dureeprevu_projet($idConnex, $_GET['projet']);
            
            //Tableau regroupant les valeurs de la duree du projet
            $tableau_delais = array($duree_totale_projet , $duree_reelle_projet , $duree_prevu_projet);
            
            //Graphique delais du projet
            creer_graphique_delais($tableau_delais);
            
            //Calcul depassement du delais
            $depassement_delais = $duree_reelle_projet - $duree_prevu_projet;
        }
        if(isset($_GET['contrat'])){
            //information sur les contrats
            $info_contrat = info_contrat($idConnex, $_GET['contrat']);
            
            //graphique budget contrat
            $montant_total_contrat = montant_total_contrat($idConnex, $_GET['contrat']);
            $montant_reel_contrat = montant_reel_contrat($idConnex, $_GET['contrat']);
            $montant_prevu_contrat = montant_prevu_contrat($idConnex, $_GET['contrat']);
            
            //Tableau regroupant les valeurs pour le cout d'un contrat
            $tableau_budget_contrat = array($montant_total_contrat , $montant_reel_contrat , $montant_prevu_contrat);
            
            //Graphique budget contrat
            creer_graphique_budget_contrat($tableau_budget_contrat);
            
            //Calcul depassement du budget pour le contrat
            $depassement_budget_contrat = $montant_reel_contrat - $montant_prevu_contrat;
        
            
        }
        if(isset($_GET['touslescontrats'])){
            //Remplis les tableaux avec les infos sur les interventions pour les 12 derniers mois
//            $tableau_delais = intervention_delais($idConnex); //$tabloDelais
//            $tableau_durees = interventions_durees($idConnex); //$tabloDurees
//            $tableau_nombre = interventions_nombre($idConnex);//$tabloNombres
//            
//            //Recup des données pour la creation des graphiques
//            foreach ($tableau_delais as $ligne){
//                $tableau_delais_mois[] = $ligne[0]."-".$ligne[1];
//                $tableau_delais_heures[] = $ligne[2];
//            }
//            
//            //Graphiques des délais d'intervention
//            creer_graphique_delais_intervention($tableau_delais_heures, $tableau_delais_mois);
//            
//            foreach ($tableau_durees as $ligne){
//                $tableau_durees_mois[] = $ligne[0]."-".$ligne[1];
//                $tableau_durees_heures[] = $ligne[2];
//            }
//            creer_graphique_courbe_intervention($tableau_durees_heures, $tableau_durees_mois, 'graph1.jpg', 'Durée des interventions');
//            
//            foreach ($tableau_nombre as $ligne){
//                $tableau_nombre_mois[] = $ligne[0]."-". $ligne[1];
//                $tableau_nombre_intervention[] = $ligne[2];
//            }
//            creer_graphique_courbe_intervention($tableau_nombre_intervention, $tableau_nombre_mois, 'graph2.jpg', 'Nombre d\'interventions');
        }
    }
}
        
require_once 'vues\squelette.php';


