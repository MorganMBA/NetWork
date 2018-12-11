<?php 
$title = "Entreprises";
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
    <br>
    <?php if (empty($res)) :
            echo "vous ne suivez aucune entreprise!";
            ?>
        <?php elseif ($res == true) :
            foreach ($res as $result) : ?>
            <?php if ($result['status'] == 'company') : ?>
            <div class="card gedf-card">
                        <div class="card-body">
                            <h5 class="card-title"><img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="Photo de profil">&nbsp&nbsp&nbsp
                            <form action="index.php?action=profilePage" method="POST">
                                <input type="hidden" value="<?=$result['contactId'] ?>">
                                <button type="submit" class="btn btn-link"><?= $result['name']. ' ' . $result['lastName'] ?></button> 
                            </form>
                        <?php endif;?>
                        </div>
                    </div>
            </div>
        <?php
        endforeach;

        
        endif; ?>

            
    <?php 
    $content = ob_get_clean();
    require('view/template.php');
    ?>