<?php

    if($error != null)
    {
        echo "<h2>".$error."</h2>";
    }
    if(isset($_FILES['imageFile']))
    {
        $uploaddir = 'ImagesDB/';
        $uploadfile = $uploaddir . basename($_FILES['imageFile']['name']);
        if (move_uploaded_file($_FILES['imageFile']['tmp_name'], $uploadfile))
        {
            echo "upload done well";
        }
        else{
            echo "upload not done";
        }
      
    }
    $titre = $Article[1];
    $contenu = $Article[2];
    $auteur = $Article[3];
    
   
?>


<div style="text-align:center">
    <h2 style="font-weight:300">Update the <span style="color:var(--color-util)"> Article</span><h2>
</div>

<form enctype="multipart/form-data" method='post' action="<?= $this->router->getArticleUpdatedURL($Article[0]) ?>"> 
        <!-- Le titre de l'article -->
        <div class="form-group row">
            <label for="titre" class="col-sm-2 col-form-label">Titre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="titreArticle" name="titre"  placeholder="ex : Comment trouver un stage..." value="<?=  $titre?>" required>
            </div>
    </div>
    
    <!-- Le contenu de l'article -->
    <div class="form-group row">
        <label for="contenu" class="col-sm-2 col-form-label">Contenu</label>
        <div class="col-sm-10">
            <textarea id="contenuArticle" type="text" rows="9" class="form-control" name="contenu" placeholder="ex : Plusieurs sites Internet de recrutement mettent..." required><?php echo htmlspecialchars($contenu); ?></textarea>
        </div>
    </div>

    <!-- L'auteur de l'article -->
    <div class="form-group row">

        <label for="auteur" class="col-sm-2 col-form-label">Auteur</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="auteurArticle" name="auteur"  placeholder="ex : Elakaddo Jean..." value="<?= $auteur?>" required>
        </div>
    </div>

    <!-- update button -->
    <div class="form-group row">
        <div class="container">
            <input type="submit" style="background-color:var(--color-util);width:200px; color:white; border-radius:50px;" class="form-control btn" value="Update" >
        </div>
    </div>
</form>