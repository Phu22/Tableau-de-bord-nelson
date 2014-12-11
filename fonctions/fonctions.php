<?php
//Fonction de JPGRAPH pour afficher des graphiques suivant un tableau

//graphique heures consommees
function creer_graphique_heures_consommees($tableauheures){
    //Specification largeur hauteur
    $graph = new Graph(370,220);
    
    //Representation lineaire
    $graph->SetScale("textlin");
    
    //Graphique histogramme
    $bplot = new BarPlot($tableauheures);
    
    //Ajout de l'ombre
    $graph->SetShadow();
    
    // Ajouter des barres
    $graph->Add($bplot);
    
    //Marges fixé
    $graph->img->SetMargin(40,30,25,40);
    
    //Afficher les valeurs pour chaque barres
    $bplot->value->Show();
    
    //Fixer l'aspect de la police
    $bplot->value->SetFont(FF_ARIAL,FS_NORMAL,9);
    
    //Titre du graphique
    $graph->title->Set("Nombres d'heures consommees");
    $graph->title->SetFont(FF_FONT1,FS_BOLD);
    
    //Titre axe vertical (axe y)
    $graph->yaxis->title->Set("Nombre d'heures");
    $graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
    
    //Etiquettes pour l'axe x (horizontal)
    $etiquettes = array ('Total','Réel' , 'Prévu');
    $graph->xaxis->SetTickLabels($etiquettes);
    
    if(file_exists("conso_heures.jpg")){
        unlink("conso_heures.jpg");
    }
    $graph->Stroke("conso_heures.jpg");
}
//Graphique Budget
function creer_graphique_budget($tableauBudget)
{
	// Spécification largeur hauteur
	$graph = new Graph(370,220);

	// Représentation linéaire
	$graph->SetScale("textlin");


	// Graphique histogramme
	$bplot = new BarPlot($tableauBudget);


	// Ajouter de l'ombre
	$graph->SetShadow();


	// Ajouter des barres
	$graph->Add($bplot);


	//Marges fixé
	$graph->img->SetMargin(40,30,25,40);


	// Afficher les valeurs pour chaque barres
	$bplot->value->Show();

	// Fixer l'aspect de la police
	$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,9);

	//Titre du graphique
	$graph->title->Set("Budget du projet");
	$graph->title->SetFont(FF_FONT1,FS_BOLD);

	//Titre axe vertical (axe y)
	$graph->yaxis->title->Set("Euros");
	$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);

	//Etiquettes pour l'axe x (horizontal)
	$etiquettes = array ('Total','Réel' , 'Prévu');
	$graph->xaxis->SetTickLabels($etiquettes);

	if(file_exists("conso_budget.jpg")){
            unlink ("conso_budget.jpg");
        }
	$graph->Stroke('conso_budget.jpg');
}
//Graphique delais
function creer_graphique_delais($tableauDelais)
{
	// Spécification largeur hauteur
	$graph = new Graph(370,220);

	// Représentation linéaire
	$graph->SetScale("textlin");


	// Graphique histogramme
	$bplot = new BarPlot($tableauDelais);


	// Ajouter de l'ombre
	$graph->SetShadow();


	// Ajouter des barres
	$graph->Add($bplot);


	//Marges fixé
	$graph->img->SetMargin(40,30,25,40);


	// Afficher les valeurs pour chaque barres
	$bplot->value->Show();

	// Fixer l'aspect de la police
	$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,9);

	//Titre du graphique
	$graph->title->Set("Delais du projet");
	$graph->title->SetFont(FF_FONT1,FS_BOLD);

	//Titre axe vertical (axe y)
	$graph->yaxis->title->Set("Jours");
	$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);

	//Etiquettes pour l'axe x (horizontal)
	$etiquettes = array ('Total','Réel' , 'Prévu');
	$graph->xaxis->SetTickLabels($etiquettes);

	if(file_exists("conso_delais.jpg")){
            unlink ("conso_delais.jpg");
        }
	$graph->Stroke('conso_delais.jpg');
}
//Graphique budget contrat
function creer_graphique_budget_contrat($tableauBudgetContrat)
{
	// Spécification largeur hauteur
	$graph = new Graph(370,220);

	// Représentation linéaire
	$graph->SetScale("textlin");


	// Graphique histogramme
	$bplot = new BarPlot($tableauBudgetContrat);


	// Ajouter de l'ombre
	$graph->SetShadow();


	// Ajouter des barres
	$graph->Add($bplot);


	//Marges fixé
	$graph->img->SetMargin(40,30,25,40);


	// Afficher les valeurs pour chaque barres
	//$bplot->value->Show();

	// Fixer l'aspect de la police
	$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,9);

	//Titre du graphique
	$graph->title->Set("Suivi du budget des contrats");
	$graph->title->SetFont(FF_FONT1,FS_BOLD);

	//Titre axe vertical (axe y)
	$graph->yaxis->title->Set("Euros");
	$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);

	//Etiquettes pour l'axe x (horizontal)
	$etiquettes = array ('Total','Réel' , 'Prévu');
	$graph->xaxis->SetTickLabels($etiquettes);

	if(file_exists("budget_contrat.jpg")){
            unlink ("budget_contrat.jpg");
        }
	$graph->Stroke('budget_contrat.jpg');
}

function creer_graphique_delais_intervention($tableau_delais,$tableau_etiquettes)
{

	// Construction du conteneur
	// Spécification largeur et hauteur
	$graph = new Graph(800,250);

	// Représentation linéaire
	$graph->SetScale("textlin");


	// Crréation du graphique (courbe)
	$courbe = new LinePlot($tableau_delais);

	// Ajouter une ombre au conteneur
	$graph->SetShadow();


	// Ajouter les courbes au conteneur
	$graph->Add($courbe);


	// Fixer les marges
	$graph->img->SetMargin(40,30,25,40);


	// Afficher les valeurs pour chaque barre
	$courbe->value->Show();

	// Fixer l'aspect de la police
	$courbe->value->SetFont(FF_ARIAL,FS_NORMAL,9);



	// Le titre
	$graph->title->Set("Délais d'intervention");
	$graph->title->SetFont(FF_FONT1,FS_BOLD);

	// Titre pour l'axe vertical (axe y)
	$graph->yaxis->title->Set("Heures");

	$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);

	// Etiquettes pour l'axe horizontal
	$etiquettes = $tableau_etiquettes;
	$graph->xaxis->SetTickLabels($etiquettes);

	if(file_exists("delais_intervention.jpg")){
		unlink ("delais_intervention.jpg");
        }
	$graph->Stroke('delais_intervention.jpg');
}



function creer_graphique_courbe_intervention($un_tableau_valeurs,$un_tableau_etiquettes,$un_nom_graphique,$un_titre)
{

	// Construction du conteneur
	// Spécification largeur et hauteur
	$graph = new Graph(800,250);

	// Représentation linéaire
	$graph->SetScale("textlin");


	// Crréation du graphique (courbe)
	$courbe = new LinePlot($un_tableau_valeurs);

	// Ajouter une ombre au conteneur
	$graph->SetShadow();


	// Ajouter les courbes au conteneur
	$graph->Add($courbe);


	// Fixer les marges
	$graph->img->SetMargin(40,30,25,40);


	// Afficher les valeurs pour chaque barre
	$courbe->value->Show();

	// Fixer l'aspect de la police
	$courbe->value->SetFont(FF_ARIAL,FS_NORMAL,9);



	// Le titre
	$graph->title->Set($un_titre);
	$graph->title->SetFont(FF_FONT1,FS_BOLD);

	// Titre pour l'axe vertical (axe y)
	$graph->yaxis->title->Set("Heures");

	$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);

	// Etiquettes pour l'axe horizontal
	$etiquettes = $un_tableau_etiquettes;
	$graph->xaxis->SetTickLabels($etiquettes);

	if(file_exists($un_nom_graphique)){
		unlink ($un_nom_graphique);
        }
	$graph->Stroke($un_nom_graphique);
}




