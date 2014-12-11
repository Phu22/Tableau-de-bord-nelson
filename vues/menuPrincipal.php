<div class="navbar navbar-default">
          <div class="navbar-inner">
            <div class="container">
                <ul class="nav">
                    <li <?php if(!isset($_GET['choixMenuP']) || isset($_GET['choixMenuP'])){if($_GET['choixMenuP'] == 1){ echo'class="active"';}} ?>><a class="brand" href="index.php?choixMenuP=1">Accueil</a></li>
                    <li <?php if(isset($_GET['choixMenuP'])){if($_GET['choixMenuP'] == 2){ echo'class="active"';}} ?>><a href='index.php?choixMenuP=2'>Clients</a></li>
                    <li <?php if(isset($_GET['choixMenuP'])){if($_GET['choixMenuP'] == 3){ echo'class="active"';}} ?>><a href='index.php?choixMenuP=3'>Collaborateurs</a></li>
                    <li <?php if(isset($_GET['choixMenuP'])){if($_GET['choixMenuP'] == 4){ echo'class="active"';}} ?>><a href='index.php?choixMenuP=4'>Projets</a></li>
                    <li <?php if(isset($_GET['choixMenuP'])){if($_GET['choixMenuP'] == 5){ echo'class="active"';}} ?>><a href='index.php?choixMenuP=5'>Contrats</a></li>
                    <li <?php if(isset($_GET['choixMenuP'])){if($_GET['choixMenuP'] == 6){ echo'class="active"';}} ?>><a href='index.php?choixMenuP=6'>Interventions</a></li>
                    <li <?php if(isset($_GET['choixMenuP'])){if($_GET['choixMenuP'] == 7){ echo'class="active"';}} ?>><a href='index.php?choixMenuP=7'>Tableaux de bord</a></li>
                    <li <?php if(isset($_GET['choixMenuP'])){if($_GET['choixMenuP'] == 8){ echo'class="active"';}} ?>><a href='index.php?choixMenuP=8'>À propos</a></li>
                </ul>
            </div>
          </div>
        </div> 










