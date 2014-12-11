<?php
//Fonction Connexion a la BDD
////////////Y////////////////B///////////////
function connexion($unDsn,$unUser,$unPass){
    try{
        $uneConnex = new PDO($unDsn, $unUser, $unPass);
        return $uneConnex;
    } catch(Exception $ex) {
        echo $ex.'</br>';
        die ("Erreur de connexion ! ");

    }
}
// Retourne les projets en cours
function projetencours($uneConnex){
    $requete = "SELECT intitule,id FROM PROJET WHERE dateFinReelle is null";
    $resultat = $uneConnex->query($requete);
    return $resultat->fetchall(PDO::FETCH_ASSOC);
}

//Permet de retourner les inforamtions d'un projet
function info_projet($uneConnex,$unidprojet){
    $requete =  "select * from projet WHERE id = " . $unidprojet;
    $resultat = $uneConnex->query($requete);
    $projetinfo = $resultat->fetch(PDO::FETCH_NUM);
    return $projetinfo ;  
}
//Nombre d'heure total prevu pour un projet
function heure_totalprojet($uneConnex , $unidprojet){
    $requete =  "select sum(dureePrevue) from realisertache WHERE idProjet = " . $unidprojet;
    $resultat = $uneConnex->query($requete);
    $heures_totale = $resultat->fetch(PDO::FETCH_NUM);
    return $heures_totale[0] ;
}
//Nombre d'heure effectué pour un projet spécifié
function heuresrelles_projet($uneConnex , $unidprojet){
    $requete =  "select sum(dureeReelle) from realisertache WHERE dureeReelle IS NOT NULL AND  idProjet = " . $unidprojet;
    $resultat = $uneConnex->query($requete);
    $heures_reelles = $resultat->fetch(PDO::FETCH_NUM);
    return $heures_reelles[0] ;
}
//Nombre d'heure prévu pour un projet spécifié
function heuresprevues_projet($uneConnex , $unidprojet){
	$requete =  "select sum(dureePrevue) from realisertache WHERE dureeReelle IS NOT NULL AND  idProjet = " . $unidprojet;
	$resultat = $uneConnex->query($requete);
	$heures_prevues = $resultat->fetch(PDO::FETCH_NUM);
	return $heures_prevues[0] ;
}
// Bugjet total previsionnel d'un projet spécifié
function budget_total_projet($uneConnex, $unidprojet){
    $requete =  "select sum(chargePrevue)"
            . "+ (select sum(dureePrevue * coutHoraireEmploye ) "
            . "from realisertache where idProjet = ". $unidprojet.")from tache where  idProjet = ". $unidprojet;
    $resultat = $uneConnex->query($requete);
    $budget_total = $resultat->fetch(PDO::FETCH_NUM);
    return $budget_total[0] ;
}
// Budget réel consommé d'un projet spécifié
function budget_reelle_projet($uneConnex, $unidprojet){
    $requete =  "select sum(chargeReelle)"
            . "+ (select sum(dureeReelle * coutHoraireEmploye ) from realisertache where  dureeReelle IS NOT NULL AND idProjet = ". $unidprojet.") 
                from tache where dateFinReelle IS NOT NULL
                and idProjet = ". $unidprojet;
    $resultat = $uneConnex->query($requete);
    $budget_reelle = $resultat->fetch(PDO::FETCH_NUM);
    return $budget_reelle[0] ;
}
//Budget prévu pour les taches achevés du projet
function budget_prevu_projet($uneConnex, $unidprojet){
    $requete =  "select sum(chargePrevue)"
            . "+ (select sum(dureePrevue * coutHoraireEmploye ) from realisertache where  dureeReelle IS NOT NULL AND idProjet = ". $unidprojet.")
                from tache where dateFinReelle IS NOT NULL
                and idProjet = ". $unidprojet;
	$resultat = $uneConnex->query($requete);
	$budget_prevu = $resultat->fetch(PDO::FETCH_NUM);
	return $budget_prevu[0] ;
}
//Durée du total du projet en jours 
function dureetotale_projet($uneConnex, $unidprojet){
    $requete =  "select datediff(day , dateDebutPrevue , dateFinPrevue )  from projet where id = ". $unidprojet  ;
    $resultat = $uneConnex->query($requete);
    $duree_totale = $resultat->fetch(PDO::FETCH_NUM);
    return $duree_totale[0] ;
}
//Durée reelle du projet entre le debut du projet et la dernière tache effectué
function dureereelle_projet($uneConnex, $unidprojet){
    $requete =  "select datediff(day , dateDebutPrevue , (select max (dateFinReelle) 
                                                            from tache 
                                                            where idProjet =" . $unidprojet . "))  
                from  projet
                where id = ". $unidprojet  ;
    $resultat = $uneConnex->query($requete);
    $duree_reelle = $resultat->fetch(PDO::FETCH_NUM);
    return $duree_reelle[0] ;
}
// Durée prévu du projet entre le début du projet et la date de fin prévue de la dernière tâche achevée
function dureeprevu_projet($uneConnex, $unidprojet){
    $requete =  "select datediff(day , dateDebutPrevue ,(select  distinct dateFinPrevue from tache
                                                        where idProjet =" . $unidprojet . "
                                                        and dateFinReelle  = (select max (dateFinReelle) 
                                                                            from tache 
                                                                            where idProjet =" . $unidprojet . ")))  
                from  projet
                where id = ". $unidprojet  ;	
    $resultat = $uneConnex->query($requete);
    $duree_prevue = $resultat->fetch(PDO::FETCH_NUM);
    return $duree_prevue[0] ;
}
//Contrat en cours
function contratencours($uneConnex){
    $requete = "select * from contrat where datediff(day , dateDebut, getdate()) <= 365";
    $resultat = $uneConnex->query($requete);
    $lescontratencours = $resultat->fetchAll(PDO::FETCH_NUM);
    return $lescontratencours ;
}
//Informations sur le contrat
function info_contrat($uneConnex,$unidcontrat){
    $requete = "select contrat.id,contrat.dateDebut,application.nom,client.raisonSociale from contrat,application,client where contrat.idClient = client.id and contrat.idApplication = application.id and contrat.id =". $unidcontrat;
    $resultat = $uneConnex->query($requete);
    $info_contrat = $resultat->fetch(PDO::FETCH_ASSOC);
    return $info_contrat;
}

function montant_total_contrat($uneConnex,$unidcontrat){
    $requete ="select montant FROM contrat where id=". $unidcontrat;
    $resultat = $uneConnex->query($requete);
    $montant_total = $resultat->fetch(PDO::FETCH_NUM);
    return $montant_total[0];
}

function montant_reel_contrat($uneConnex,$unidcontrat){
    $requete = "SELECT SUM( chargeIntervention + duree/60 * coutHoraireEmploye )
				FROM intervention
				WHERE idContrat = ".$unidcontrat;
    $resultat = $uneConnex->query($requete);
    $montant_reel = $resultat->fetch(PDO::FETCH_NUM);
    return $montant_reel[0];
    
}

function montant_prevu_contrat($uneConnex,$unidcontrat){
    $requete = "SELECT datediff (day ,dateDebut, GetDate() )/365.0 *  montant
				FROM Contrat
				WHERE id = ".$unidcontrat;
    $resultat = $uneConnex->query($requete);
    $montant_prevu = $resultat->fetch(PDO::FETCH_NUM);
    return $montant_prevu[0];
}

function intervention_delais($uneConnex){
    $requete = "SELECT  month(dateAppel) , year(dateAppel) , AVG( datediff(minute , cast(dateAppel  as datetime) + heureAppel , cast(dateDebut  as datetime) + heureDebut))
                from intervention 
                where dateDebut is not null
                and dateDebut < datefromparts (year(GETDATE()), month (GETDATE(), 1 ) 
                and dateDebut > datefromparts (year(GETDATE())+1, month (GETDATE(), 1 ) 
                group by month(dateAppel) , year(dateAppel)
                order by 2 , 1 ";
    $resultat = $uneConnex->query($requete);
    $delais_intervention = $resultat->fetchAll(PDO::FETCH_NUM);
    return $delais_intervention;
}

function interventions_durees($uneConnex){
    $requete =  "SELECT  month(dateAppel) , year(dateAppel) ,avg(duree)
                from intervention
                where dateDebut is not null
                and dateDebut < datefromparts (year(GETDATE()), month (GETDATE(), 1 ) 
                and dateDebut > datefromparts (year(GETDATE())+1, month (GETDATE(), 1 ) 
                group by month(dateAppel) , year(dateAppel)
                order by 2 , 1 ";
    $resultat = $uneConnex->query($requete);
    $durees = $resultat->fetchAll(PDO::FETCH_NUM);
    return $durees ;
}

function interventions_nombre($uneConnex){
	$requete =  "SELECT  month(dateAppel) , year(dateAppel) ,count(*)/count(distinct idContrat)
                    from intervention
                    where dateDebut is not null
                    and dateDebut < datefromparts (year(GETDATE()), month (GETDATE(), 1 ) 
                    and dateDebut > datefromparts (year(GETDATE())+1, month (GETDATE(), 1 ) 
                    group by month(dateAppel) , year(dateAppel)
                    order by 2 , 1 ";
	$resultat = $uneConnex->query($requete);
	$nombres = $resultat->fetchAll(PDO::FETCH_NUM);
	return $nombres ;
}

?>
