<?php 
    $titre = $Article[1];

?>


<div style="text-align:center">
    <h2 style="font-weight:300">Supprimer un <span style="color:var(--color-util)"> Article</span><h2>
</div>

<!-- Article deletion -->
<section class="container">
    <div class="row">
        <div class="introd">
            <div class="introd">
                <!--Ask deletion  -->
                <p class="lead">Vous voulez vraiment supprimer l'article "<span style="color:var(--color-util)"><?= $titre?> </span> " ?</p>
                <!--BUTTON  -->
                <a class="customAnchor" href="<?= $this->router->geTListURL()?>"><span>Annuler</span></a>
                <a class="customAnchor" href="<?= $this->router->getArticleDeletionURL($id)?>"><span>Oui</span></a>
            </div>
        </div>
    </div>
</section>
<br><br><br><br>
