<?php
    interface ArticleStorage{

        /**Car ayant pour identifiant*/
        public function read($id);

        /**renvoyer un tableau associatif identifiant ⇒ article*/
        public function readAll();
        /** Supprimer un article */
        public function delete($id);
    }
?>