<?php

    class Article{
        protected $titre;
        protected $contenu;
        protected $auteur;
        protected $dateCreation;

        public function __construct($titre,$contenu,$auteur)
        {
            $this->titre = $titre;
            $this->contenu = $contenu;
            $this->auteur = $auteur;
            $this->dateCreation = date("Y-m-d H:i:s");
        }

        public function getTitre()
        {
            return $this->titre;
        }

        public function getContenu()
        {
            return $this->contenu;
        }

        public function getAuteur()
        {
            return $this->auteur;
        }

        public function getDateCreation()
        {
            return $this->dateCreation;
        }
    }
?>