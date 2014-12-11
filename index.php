<?php  session_start()?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Nelson 2014-2015</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <!-- CSS -->
                <link rel="stylesheet" href="styles/bootstrap-combined.min.css" type="text/css"/>
                <link rel="stylesheet" href="styles/style.css" type="text/css"/>
                <!-- JS -->
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
                <script type="text/javascript" src="styles/js/bootstrap.min.js"></script>
	</head>
<body>

<?php
	include 'controleurs/controleur.php';
?>


</body>
</html>

<?php
/*
function interventionDelais($uneConnex){
	$requete = "SELECT month(dateAppel), year(dateAppel), AVG( datediff(minute, cast(dateAppel as datetime) + cast(heureAppel as datetime), cast(dateDebut as datetime) + cast(heureDebut as datetime)))
					FROM intervention
					WHERE dateDebut is not null
					AND dateDebut < datefromparts (year(GETDATE()), month(GETDATE()), 1)
					AND dateDebut > datefromparts (year(GETDATE()) - 1, month (GETDATE()), 1)
					GROUP BY month(dateAppel), year(dateAppel)
					ORDER BY 2, 1;";
	$resultat = $uneConnex->query($requete);
	return $resultat->fetchAll(PDO:: FETCH_NUM); 
}
 * */

