<?php

    class Router
    {

        public function __construct(){}

        public function main(ArticleStorageMySQL $ArticleStor)
        {
            /* On démarre la session */
            session_start();


            $feedback = key_exists('feedback', $_SESSION) ? $_SESSION['feedback'] : '';
            $_SESSION['feedback'] = "";

            /*ici */
            $view = new View($this, $feedback);
            //$ArticleStor = new ArticleStorageFile();
            $controller = new Controller($view, $ArticleStor);

            ///$ArticleStor->reinit();

            ///ANALYSE DE L'URL
            $ArticleId = key_exists('ArticleId', $_GET)? $_GET['ArticleId']:null;
            $action = key_exists('action', $_GET)? $_GET['action']:null;
            
            if ($action === null)
            {
                //PAS D'ACTION DEMANDER
                $action = ($ArticleId === null)? "accueil":"voir";
            }
            try{
                switch ($action)
                {
                    case "voir":
                        if($ArticleId === null)
                        {
                            $view->makeUnknownArticle($ArticleId);
                        }else {
                            $controller->showInformation($ArticleId);
                        }
                        break;

                    case "galerie":
                        $controller->showList();
                        break;
                    case "filtreName":
                            $controller->showListFilter($_POST);
                            break;

                    case "accueil":
                        $view->acceuil();
                        break;
                    case "apropos":
                        $view->aproposPage();
                        break;
                    case "nouveau":
                        $controller-> newArticle();
                        break;
                    case "sauverNouveau":
                        $controller->saveNewArticle($_POST);
                        break;
                    case "confirmDelete":
                        if($ArticleId === null)
                        {
                            $view->makeUnknownArticle($ArticleId);
                        }else {
                            $controller->askArticleDeletion($ArticleId);
                        }
                        break;
                        
                    case "delete":
                        if($ArticleId === null)
                        {
                            $view->makeUnknownArticle($ArticleId);
                        }else {
                            $controller->deleteArticle($ArticleId);
                        }
                        
                        break;
                    case "update":
                        $controller->updating($ArticleId,$_POST);
                        break;
                    
                    case "wasUpdated":
                        $controller->updated($ArticleId,$_POST);
                        break;

                    default :
                        //L'internaute a demandé une action non prévue.
                        $view->makeUnknownArticle($ArticleId);
                        break;
                }
            }
            catch(Exception $e){
                $view->makeUnexpectedErrorPage($e);
            }

            //Enfin, on affiche la page préparée */
            $view->render();
        }

        public function getObjetURL($id)
        {
            return "Objets.php?action=voir&ArticleId=$id";
        }

        public function getListURL()
        {
            return "Objets.php?action=galerie";
        }
        public function getFilterListURL()
        {
            return "Objets.php?action=filtreName";
        }

        public function getAproposURL()
        {
            return "Objets.php?action=apropos";
        }

        public function getArticleCreationURL()
        {
            return "Objets.php?action=nouveau";
        }

        public function getArticleSaveURL()
        {
            return "Objets.php?action=sauverNouveau";
        }
        public function accueil()
        {
            return "Objets.php?accueil";
        }

        public function getArticleAskDeletionURL($id)
        {
            return "Objets.php?action=confirmDelete&ArticleId=$id";
        }
        public function getArticleDeletionURL($id)
        {
            return "Objets.php?action=delete&ArticleId=$id";
        }
        public function getArticleUpdatingURL($id)
        {
            return "Objets.php?action=update&ArticleId=$id";
        }
        public function getArticleUpdatedURL($id)
        {
            return "Objets.php?action=wasUpdated&ArticleId=$id";
        }

        public function POSTredirect($url, $feedback)
        {
            $_SESSION['feedback'] = $feedback;
            header("Location: ".htmlspecialchars_decode($url), true, 303);
            die;
        }

    }
?>
