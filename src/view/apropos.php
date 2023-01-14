
<div class="bg-white">
  <div class="container py-5">
    <div class="row h-100 align-items-center py-5">
      <div class="col-lg-6">
            <h1 class="display-4">A  propos <span style="color:var(--color-util)">de</span> projet.</h1>
        <p class="lead text-muted mb-0">
        <ul class="text-muted">
          <li>
            L'objectif de ce projet est de réaliser un site web simple qui permet d'afficher, d'ajouter, de modifier et de supprimer des articles (titre, contenu, auteur, date de création).
          </li>
          <li>
            PHP Natif (modèle, vue, controlleur et routeur), ce projet n'utilise pas de frameworks.
          </li>
          <li>
            Le choix du Boostrap c'était pour avoir un site web résponsive dans multiples dispositifs (PC, Tablette, Mobile).
          </li>
        
      </div>
      <div class="col lg-6 text-center">
      <!-- Team item-->
      <div class="mb-4 mb-lg-0">
        <div class="rounded shadow-sm py-5 px-4"><img src="res/developer.jpg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Mohamed Akaddar </h5>
          <span class="small text-uppercase text-muted">Etudiant - L3 Unicaen</span><br>
          <span class="small text-uppercase text-muted">Numéro - 22109265 </span><br>
          <span class="small text-uppercase text-muted"> elakaddo@gmail.com </span><br>
          
        </div>
      </div>
      <!-- End-->
    </div>
    </div>
  </div>
</div>
<br>
<div class="bg-white py-5">
  <div class="container py-5">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light"><span style="color:var(--color-util)">Ajouter</span> vos propres articles.</h2>
        <p class="font-italic text-muted mb-4">Dans cette fonctionnalité nous vous offrons d'ajouter vos propres articles.<br>Possibilité de modifier ou supprimer.</p><a href="<?= $this->router->getArticleCreationURL()?>" class="btn btn-light px-5 rounded-pill shadow-sm">Nouveau article ?</a>
      </div>
      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="res/add2.png" alt="" class="img-fluid mb-4 mb-lg-0"></div>
    </div>
    <br><br>
    <div class="row align-items-center">
      <div class="col-lg-5 px-5 mx-auto"><img src="res/upload.jpg" alt="https://unilockacgear.com/products/logo-file-upload" class="img-fluid mb-4 mb-lg-0"></div>
      <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Compléments.</h2>
        <ol>
            <li>  
              <p class="font-italic text-muted mb-4"><span style="color:var(--color-util)">Filtrer</span> les articles avec leurs titres<br>respet des requètes préparées.</p>
            </li>
        
        </ol>
      </div>
    </div>
  </div>
</div>

<br><br><br><br><br><br><br><br><br>
