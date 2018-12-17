<?php
    //PAGE D'AFFICHAGE DES EVENEMENTS
    $title="Evénements";
    ob_start();
?>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
        
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<nav class="navbar navbar-light bg-bleu">
        <a href="index.php?action=home" class="home"><img width="45" src="https://image.flaticon.com/icons/svg/263/263115.svg" alt="Photo de profil"></a>
        <a href="index.php?action=showEvents" class="home"><img width="45" src="https://www.shareicon.net/data/2016/08/07/808208_calendar_512x512.png" alt="Photo de profil"></a>
        <form class="form-inline" action="index.php?action=search" method="POST">
            <div class="input-group">
                <input type="text" placeholder= "Rechercher un membre " name="research" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit"  id="button-addon2">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
</nav>

<!-- PROFIL-->
    <div class="container-fluid gedf-wrapper">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="h5"><img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="Photo de profil">&nbsp&nbsp&nbsp
                        <?= $profile['name'] . ' ' . $profile['lastName'] ?></div>
                        <div class="h7">
                            <?= $profile['job'] . ' chez ' . $profile['company'] ?>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="h6 text-muted"><a href="index.php?action=companyList">Entreprises</a></div>
                            <div class="h5"><?= $followedCompaniesNb ?></div>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted"><a href="index.php?action=contactList">Contacts</a></div>
                            <div class="h5"><?= $contactsNb ?></div>
        
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted"><a href="index.php?action=updateProfile">Modifier le profil</a></div>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted"><a href="index.php?action=deleteView">Supprimer le compte</a></div>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted"><a href="index.php?action=disconnect">Déconnexion</a></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 gedf-main">

<h1>Mes événements</h1>
<form action="index.php" method="GET">
    <input type="hidden" name="action" value="createEventView">
    <input type="submit" name="submit" value="Créer un événement">
</form>
<?php
    if(isset($_SESSION['erreur']) && $_SESSION['erreur']!=="")
    {
        echo "<br/>".$_SESSION['erreur']."<br/>";
        $_SESSION['erreur']="";
    }
    else
    {
        echo "<br/>";
    }
    //PRENDRE EN COMPTE LES INVITATIONS
    /*
    echo "<form action='index.php' method='GET'>
    		<input type='hidden' name='action' value='joinInvitation'>
            <input type='hidden' name='id' value='".$event[$i][0]."'>
            <button>Rejoindre un événement</button>
        </form>";
    echo "<form action='index.php' method='GET'>
    		<input type='hidden' name='action' value='declineInvitation'>
            <input type='hidden' name='id' value='".$event[$i][0]."'>
            <button>Refuser un événement</button>
        </form>";
    */
    if($admin!=false)
    {
        echo "<h2>J'organise</h2>";
        //AFFICHER LES EVENEMENTS QUE L'UTILISATEUR ORGANISE
        for($i=0;$i<sizeof($admin);$i++)
        {
            echo $admin[$i][1];
            echo "<form action='index.php' method='GET'>
                <input type='hidden' name='action' value='eventView'>
                <input type='hidden' name='id' value='".$admin[$i][0]."'>
                <input type='hidden' name='role' value='admin'>
                <input type='submit' name='submit' value='Afficher la page de l&apos;événement'>
            </form><br/>";
        }
    }
    else
    {
        $role--;
    }
    if($event!=false)
    {
        echo "<br/><h2>Je participe</h2>";
        //AFFICHER LES EVENEMENTS OU L'UTILISATEUR PARTICIPE MAIS DONT IL N'EST PAS L'ADMINISTRATEUR
        for($j=0;$j<sizeof($event);$j++)
        {
            echo $event[$j][1];
            echo "<form action='index.php' method='GET'>
                <input type='hidden' name='action' value='eventView'>
                <input type='hidden' name='id' value='".$event[$j][0]."'>
                <input type='hidden' name='role' value='participate'>
                <input type='submit' name='submit' value='Afficher la page de l&apos;événement'>
            </form>";
        }
    }
    else
    {
        $role--;
    }
    if($role==0)
    {
        echo "Vous ne participez à aucun événement.";
    }
    $content=ob_get_clean();
    require('view/template.php');
?>