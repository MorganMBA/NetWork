<?php 
$title = "Accueil";
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
                            <div class="h6 text-muted">Entreprises</div>
                            <div class="h5"><?= $followedCompaniesNb ?></div>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted"><a href="index.php?action=contactList">Contacts</a></div>
                            <div class="h5"><?= $contactsNb ?></div>
        
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted"><a href="index.php?action=updateProfile">Modifier le profil</a></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 gedf-main">
            <!------------------->

                <!--- PUBLICATION-->
                <div class="card gedf-card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make
                                    a publication</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                <div class="form-group">
                                    <label class="sr-only" for="message">Post</label>
                                    <form action="index.php?action=post" method="POST">
                                    <textarea name="content" class="form-control" id="message" rows="3" placeholder="Que souhaitez-vous publier ?" required></textarea>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Upload image</label>
                                    </div>
                                </div>
                                <div class="py-4"></div>
                            </div>
                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <input type="hidden" name="type" value="text">
                                <button type="submit" class="btn btn-primary">Publier</button>
                                </form>
                            </div>
                            <div class="btn-group">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!----------------->

               

                <!--- ---------FIL D'ACTUALITÉ--------- -->
                <div>
                    <?php 
                    for ($i = 0; $i < count($contactsPosts); $i++) :
                    ?>
                    <div class="card gedf-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div class="h5 m-0"><?= $contactsPosts[$i]['name'] . ' ' . $contactsPosts[$i]['lastName'] ?></div>
                                    </div>
                                </div>
                                <div>

                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> <?= $contactsPosts[$i]['postDate'] ?></div>

                            <p class="card-text">
                                <?= $contactsPosts[$i]['content'] ?>
                            </p>
                            <!--<div>
                                <span class="badge badge-primary">JavaScript</span>
                                <span class="badge badge-primary">Android</span>
                                <span class="badge badge-primary">PHP</span>
                                <span class="badge badge-primary">Node.js</span>
                                <span class="badge badge-primary">Ruby</span>
                                <span class="badge badge-primary">Paython</span>
                            </div> -->
                        </div>
                        <div class="card-footer">
                            <div class="input-group">
                        <input type="text" name="comment" placeholder="Écrivez un commentaire" class="form-control"  aria-describedby="button-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit"  id="button-addon2">
                            <i class="fa fa-comment"></i>
                    </button>
                </div>
                </div>
                        </div>
                    </div>
                    <?php 
                    endfor;
                    ?>
                </div>
            </div>
                <!--------------------------------->


               



<!--------- SUGGESTIONS DE CONTACTS----------->
<div class="col-md-3">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="card gedf-card">
            <div class="card-body">
                        <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                        <h5 class="card-title"><?= $employeesSuggests[0]['name'] . ' ' . $employeesSuggests[0]['lastName'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $employeesSuggests[0]['job'] . ' chez ' . $employeesSuggests[0]['company'] ?></h6>
                        <a href="#" class="card-link"> <a href="index.php?action=addcontacts&id=<?= $employeesSuggests[0]['id'] ?>" class="card-link"> <img src="./img/icon/users.png"> </a></a>
            </div>
        </div>
    </div>
    <?php 
    if (count($employeesSuggests) > 1) :
    for ($i = 1; $i < count($employeesSuggests)-1; $i++) : ?>
    <div class="carousel-item">
    <div class="card gedf-card">
                        <div class="card-body">
                        <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                        <h5 class="card-title"><?= $employeesSuggests[$i]['name'] . ' ' . $employeesSuggests[$i]['lastName'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $employeesSuggests[$i]['job'] . ' chez ' . $employeesSuggests[$i]['company'] ?></h6>
                        <a href="#" class="card-link"> <a href="index.php?action=addcontacts&id=<?= $employeesSuggests[$i]['id'] ?>" class="card-link"> <img src="./img/icon/users.png"> </a></a>
                    </div>
                </div>     </div>
    <?php endfor; 
           endif; ?>
    

    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--------------------------> 

<!--------- SUGGESTIONS D'ENTREPRISE----------->
<?php if (count($companiesSuggests) > 1) :?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="card gedf-card">
            <div class="card-body">
                        <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                        <h5 class="card-title"><?= $companiesSuggests[0]['name']?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $companiesSuggests[0]['town'] ?></h6>
                        <a class="card-link" href="index.php?action=addcontacts&id=<?= $companiesSuggests[0]['id'] ?>" class="card-link"> <img src="./img/icon/users.png"> </a>
            </div>
        </div>
    </div>
    <?php 
    
    for ($i = 1; $i < count($companiesSuggests); $i++) : ?>
    <div class="carousel-item">
    <div class="card gedf-card">
                    <div class="card-body">
                        <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                        <h5 class="card-title"><?= $companiesSuggests[$i]['name'] . ' ' . $companiesSuggests[$i]['lastName'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $companiesSuggests[0]['town'] ?></h6>
                        <a class="card-link" href="index.php?action=addcontacts&id=<?= $companiesSuggests[$i]['id'] ?>" class="card-link"> <img src="./img/icon/users.png"> </a>
                    </div>
                </div>     </div>
    <?php endfor; 
           endif; ?>
<!--------------------------> 

 
    </div>
    <?php 
    $content = ob_get_clean();
    require('view/template.php');
    ?>