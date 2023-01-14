<?php

    class View {
        protected $title;
        protected $content;
        protected $router;
        protected $feedback;

        public function __construct(Router $r, $feedback)
        {
            $this->router = $r;
            $this->title = null;
            $this->content = null;
            $this->feedback = $feedback;
        }

        public function render()
        {
            $title = $this->title;
            $content = $this->content;

             /* PAGE MERE */
            include("squelette.php");
        }
        public function makeTestPage()
        {
            $this->title="Test";
            $this->content="Contenu";
        }

        public function makeArticlePage($Article)
        {
            ob_start();
            include("articleInfo.php");
            $this->content = ob_get_clean();
        }

        public function makeUnknownArticle($ArticleId)
        {
            ob_start();
            include("uknownArticle.php");
            $this->content = ob_get_clean();
        }

        public function acceuil()
        {
            ob_start();
            include("Accueil.php");
            $this->content = ob_get_clean();
         
        }

        public function makeListePage($tab)
        {
            ob_start();
            include("listPage.php");
            $this->content = ob_get_clean();
            //throw new Exception("not yet");
        }

        /*DEBUG PAGE */
        public function makeDebugPage($variable)
        {
            $this->title = 'Debug';
            $this->content = '<pre>'.htmlspecialchars(var_export($variable, true)).'</pre>';
        }

        /*ERROR PAGE */
        public function makeUnexpectedErrorPage($e)
        {
            $this->title = 'Exception';
            $this->content = $e;
        }

        /*CREATE Article PAGE */
        public function  makeArticleCreationPage($data, $error=null)
        {
            ob_start();
            include("form.php");
            $this->content = ob_get_clean();
        }

        /*CREATE Article PAGE */
        public function  makeUpdateArticlePage($ArticleId,$Article, $error=null)
        {
            ob_start();
            include("update.php");
            $this->content = ob_get_clean();
        }


        /*CONTACT PAGE */
        public function  contactPage()
        {
            ob_start();
            include("contact.php");
            $this->content = ob_get_clean();
        }

        /*ABOUT PAGE */
        public function  aproposPage()
        {
            ob_start();
            include("apropos.php");
            $this->content = ob_get_clean();
        }

        /* CONFIRM DELETETION PAGE */
        public function makeArticleDeletionPage($id ,$Article)
        {
            ob_start();
            include("delete.php");
            $this->content = ob_get_clean();
        }

        /* CONFIRM DELETETION PAGE */
        public function ArticleDeleted()
        {
            ob_start();
            include("deleted.php");
            $this->content = ob_get_clean();
        }
        public function displayArticleCreationSuccess($id){
            $this->feedback = "Article added succesfully";
            $this->router->POSTredirect($this->router->getObjetURL($id), $this->feedback);

          
        }
        public function displayArticleCreationError() {
            $this->feedback = "Error invalid information!";
            $this->router->POSTredirect($this->router->getArticleCreationURL(), $this->feedback);
        }
        public function displayArticleUpdatingError() {
            $this->feedback = "Error invalid information!";
            $this->router->POSTredirect($this->router->getArticleCreationURL(), $this->feedback);
        }
        public function displayArticleUpdatedSuccess() {
            $this->feedback = "Article updated succefully!";
            $this->router->POSTredirect($this->router->getListURL(), $this->feedback);
        }
        public function displayArticleDeletedSuccess() {
            $this->feedback = "Article deleted succefully!";
            $this->router->POSTredirect($this->router->getListURL(), $this->feedback);
        }

    }
?>
