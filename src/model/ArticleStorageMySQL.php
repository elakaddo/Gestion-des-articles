<?php

    class ArticleStorageMySQL implements ArticleStorage
    {
        private $db;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function readAll(){
            $stmt = $this->db->query('SELECT * FROM Article;');
            $res = $stmt->fetchAll();
            return $res;
        }

        /* ----------Partie CRUD-------------- */

        /* Utilisation des requetes préparées*/
        public function read($id){
            $rq = 'SELECT * FROM Article WHERE id= :nb;';
            $stmt = $this->db->prepare($rq);
            $stmt->bindValue(":nb", $id, PDO::PARAM_INT);
            $stmt->execute();
            $article = $stmt->fetch();
            return $article;
        }

         /** CREAT */
         public function create(Article $a)
         {
            $rq = "INSERT INTO Article VALUES(".$this->db->LastInsertId().",:titre, :contenu, :auteur, :dateCreation)";
            $stmt = $this->db->prepare($rq);
            $stmt->bindValue(":titre", $a->getTitre(), PDO::PARAM_STR);
            $stmt->bindValue(":contenu", $a->getContenu(), PDO::PARAM_STR);
            $stmt->bindValue(":auteur", $a->getAuteur(), PDO::PARAM_STR);
            $stmt->bindValue(":dateCreation", $a->getDateCreation(), PDO::PARAM_STR);

            $stmt->execute();
            $lastId = $this->db->LastInsertId();
            return $lastId;
         }
 
         /** UPDATE */
         public function update($id, Article $a)
         {
            $rq = "UPDATE Article SET titre= :titre, contenu= :contenu, auteur = :auteur WHERE id =:id;";
            $stmt = $this->db->prepare($rq);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->bindValue(":titre", $a->getTitre(), PDO::PARAM_STR);
            $stmt->bindValue(":contenu", $a->getContenu(), PDO::PARAM_STR);
            $stmt->bindValue(":auteur", $a->getAuteur(), PDO::PARAM_STR);

            $stmt->execute();
            
         }
         /**Supprimer un article avec son id*/
         public function delete($id){
            $rq = 'DELETE  FROM Article WHERE id= :id;';
            $stmt = $this->db->prepare($rq);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
        }

        /** Supprimer tous les articles */
         public function deleteAll()
         {
            $rq = 'DELETE  FROM Article;';
            $stmt = $this->db->prepare($rq);
            $stmt->execute();
         }

         /**Filtrer les articles avec l'attribut Titre */
         public function filter($titre)
         {
            $rq = "SELECT * FROM Article WHERE titre like '%".$titre."%';";
            $stmt = $this->db->prepare($rq);
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
         }
    }

?>