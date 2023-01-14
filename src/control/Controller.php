<?php
    class Controller
    {
        protected View $view;
        protected ArticleStorageMySQL $ArticleStor;
        protected $ArticleBuilder;


        public function __construct(View $view, $ArticleStor)
        {
            $this->view = $view;
            $this->ArticleStor = $ArticleStor;
            $this->ArticleBuilder = key_exists('ArticleBuilder', $_SESSION) ? $_SESSION['ArticleBuilder'] : null;
        }

        public function __destruct() {
            $_SESSION['ArticleBuilder'] = $this->ArticleBuilder;
        }
        

        /**
         * Afficher les informations d'un article
         * */
        public function showInformation($ArticleId)
        {
            $Article = $this->ArticleStor->read($ArticleId);
            if($Article != null)
            {
                $this->view->makeArticlePage($Article);
            }
            else
                $this->view->makeUnknownArticle($ArticleId);
        }

        /**
         * Afficher la liste des articles       
         * */
        public function showList()
        {
            $this->view->makeListePage($this->ArticleStor->readAll());
        }

        /** Filtrer la liste des articles */
        public function showListFilter($data){
            $this->view->makeListePage($this->ArticleStor->filter($data["titre"]));
        }


        /** 
         * Ajoute un  nouveau article              
         * */
        public function newArticle()
        {
            if ($this->ArticleBuilder === null) {
                $this->ArticleBuilder = new ArticleBuilder();
            }
            $this->view->makeArticleCreationPage($this->ArticleBuilder);
        }

        public function saveNewArticle($data){
            $this->ArticleBuilder = new ArticleBuilder($data);
            
            if ($this->ArticleBuilder->isValid())
            {
                $Article = $this->ArticleBuilder->createArticle($data);
                $ArticleId = $this->ArticleStor->create($Article);
                /* on detruit le builder */
                $this->ArticleBuilder  = null;
                /* redirection vers la page d'article ajouté*/
                $this->view->displayArticleCreationSuccess($ArticleId);
            }
            else
            {   
                $this->view->displayArticleCreationError();
                
            }
        }
        /**
         * supprimer un article
         * */
        public function askArticleDeletion($ArticleId)
        {
            $Article = $this->ArticleStor->read($ArticleId);
            if($Article != null)
            {
                $this->view->makeArticleDeletionPage($ArticleId,$Article);
            }
            else
                $this->view->makeUnknownArticle($ArticleId);
        }


        public function deleteArticle($ArticleId)
        {
            $Article = $this->ArticleStor->read($ArticleId);
            if($Article != null)
            {
                $this->ArticleStor->delete($ArticleId);
                $this->view->displayArticleDeletedSuccess();
            }
            else
                $this->view->makeUnknownArticle($ArticleId);
        }


        /**
         * Editer les infos d'un article   
         */
        
        public function updating($ArticleId, $data)
        {
            $Article = $this->ArticleStor->read($ArticleId);
            if($Article != null)
            {
                $this->view->makeUpdateArticlePage($ArticleId,$Article);
            }
            else
                $this->view->makeUnknownArticle($ArticleId);
        }

        public function updated($ArticleId,$data)
        {
            $this->ArticleBuilder = new ArticleBuilder($data);
            if ($this->ArticleBuilder->isValid())
            {
                $Article = $this->ArticleBuilder->updateArticle();
                $this->ArticleStor->update($ArticleId,$Article);
                $this->view->displayArticleUpdatedSuccess();
            }
            else
            {
              $this->view->displayArticleUpdatingError();
            }
        }
    }
?>