<?php 
    /*Construction des valeurs des champs de la table Article dans la BD */
    $titre = $Article[1];
    $contenu = $Article[2];
    $auteur = $Article[3];
    $date = $Article[4];

?>

<!-- Article Information -->
<section class="container introd">
            <h2 class="Titre"></h2>
            <p class="lead"><b>Titre :</b> <?= $titre?></span></p>
            <p class="lead"><b>Contenu :</b> <?= $contenu?></span></p>
            <p class="lead"><b>Auteur : </b><?= $auteur ?></span></p>
            <p class="lead"><b>Date de création : </b><?= $date?></span></p>
            <div class="introd">
                <!--BUTTON  -->
                <a class="customAnchor" href="<?= $this->router->getListURL()?>"><span>Tous les articles</span></a>
            <br>
            </div>
</section>
<br><br><br><br>
