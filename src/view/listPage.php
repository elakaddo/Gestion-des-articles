
<div style="text-align:center">
    <h2 style="font-weight:300">Liste des <span style="color:var(--color-util)">Articles</span><h2>
    <br>
        <div>
            <div class="row" style="align-items:center;justify-content:center;">
                <form method="POST" action="<?= $this->router->getFilterListURL() ?>">
                    <div class="input-group">
                        <input type="text" name="titre"class="form-control" placeholder="ex : Stage, Alternance  .." >
                        <button type="submit" class="btn btn-outline-danger"><img src="res/cherche.png" width='20' height='20'/>Filtrer</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<!-- Indications :  -->
<!-- 
    row[0] : represente 'id' de la voiture dans la base de données
    row[1] : represente 'name' de la voiture dans la base de données
    row[2] : represente 'brand' de la voiture dans la base de données
    row[3] : represente 'model' de la voiture dans la base de données
    row[4] : represente 'type' de la voiture dans la base de données
    row[5] : represente 'image' de la voiture dans la base de données
-->
<!-- Fin indications-->


<!-- List of Cars-->
<div class="listofCards" align="center">
    <?php
        foreach($tab as $cle => $row)
        {

            echo "<div class='row carCard'>"
                    ."<div class='col-lg-6' >"
                        ."<div class='carInfos'>"
                           . "<h6 class='title'>".$row[1]."</h6>"
                            . "<b>Auteur</b> : <span>".$row[3]."</span><br>"
                            . "<b>Date de création</b> : <span>".$row[4]."</span>"
                        ."</div>"
                    ."</div>"
                    
                    ."<div class='col col-lg-6 carButtons' >"
                        ."<div>"
                            ."<a href='"
                                .$this->router->getObjetURL($row[0])
                                ."'class='btn btnDel' >Voir plus</a><br>"
                        ."</div>"
                        ."<div>"
                            ."<a href='"
                                .$this->router->getArticleUpdatingURL($row[0])
                                ."'class='btn btnDel' >Editer</a><br>"
                        ."</div>"
                        ."<div>"
                            ."<a href='"
                                .$this->router->getArticleAskDeletionURL($row[0])
                                ."' class='btn btnDel' >supprimer</a><br>"
                        ."</div>"   
                    ."</div>"

                ."</div>";
        }
    ?>



      </div>
