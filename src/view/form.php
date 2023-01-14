<?php

    if($error != null)
    {
        echo "<h2>".$error."</h2>";
    }
    $data = $data->getData();
  
   
?>


<div style="text-align:center">
    <h2 style="font-weight:300">Ajouter un nouveau<span style="color:var(--color-util)"> article</span><h2>
</div>
<br>
<form enctype="multipart/form-data" method='POST' action="<?= $this->router->getArticleSaveURL()?>">

    <!-- Le titre de l'article -->
    <div class="form-group row">
            <label for="titre" class="col-sm-2 col-form-label">Titre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="titreArticle" name="titre"  placeholder="ex : Comment trouver un stage..." value="<?=  $data["name"] ?? ""?>" required>
            </div>
    </div>
    
    <!-- Le contenu de l'article -->
    <div class="form-group row">
        <label for="contenu" class="col-sm-2 col-form-label">Contenu</label>
        <div class="col-sm-10">
            <textarea id="contenuArticle" type="text" rows="9" class="form-control" name="contenu" value="<?=  $data["brand"] ?? ""?>" placeholder="ex : Plusieurs sites Internet de recrutement mettent en relation les entreprises et les candidats pour des emplois ou des stages : Le site www.en-stage.com diffuse des offres de stages pour étudiants, et on peut déposer son CV en ligne..." required></textarea>
        </div>
    </div>

    <!-- L'auteur de l'article -->
    <div class="form-group row">

        <label for="auteur" class="col-sm-2 col-form-label">Auteur</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="auteurArticle" name="auteur"  placeholder="ex : Elakaddo Jean..." value="<?= $data["model"]  ?? ""?>" required>
        </div>
    </div>

    <!-- Add button -->
    <div class="form-group row">
        <div class="container">
            <input type="submit" style="background-color:var(--color-util);width:200px; color:white; border-radius:50px;" class="form-control btn" value="Ajouter" >
        </div>
    </div>
</form>
<br>
<br><br>
<br>
<br><br><br>