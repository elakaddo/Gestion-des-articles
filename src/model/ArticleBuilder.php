<?php
    //qui représente un article en cours de manipulation 
    //(création ou modification) dans l'application, 
    //et qui permet de construire l'instance de Article 
    //correspondante.

    class ArticleBuilder{
        protected $data;
        protected $msg;

        public function __construct($data=null)
        {
            $this->data  = $data;
            $this->msg = null;
        }

        /** getData
         * @return data value of data attribut
         */
        public function getData()
        {
            return $this->data;
        }

        /** getMsg
         * @return msg value of msg attribut
         */
        public function getMsg()
        {
            return $this->msg;
        }

        /** createArticle
         * creer un nouveau article
         */
        public function createArticle()
        {
            $this->data["titre"] = $this->antixss($this->data["titre"]);
            $this->data["contenu"] = $this->antixss($this->data["contenu"]);
            $this->data["auteur"] = $this->antixss($this->data["auteur"]);
            
            $a = new Article($this->data["titre"],$this->data["contenu"], $this->data["auteur"]);
            return $a;
        }
        
         /** Eviter la faille XSS */
         public function antixss($chaine) {
            $chaine = str_replace("<", "", $chaine);
            return str_replace(">", "", $chaine);
         } 
        
        /** isValid
         * la validation du formulaire 
         */
        public function isValid()
        {
            /* ici on teste tout*/
            if($this->data["titre"] == "" || $this->data["contenu"]=="" || $this->data["auteur"]=="")
            {
                $this->msg = "Error !! invalide form";
                return false;
            }
            return true;
        }
        /** Editer l'article
         */
        public function updateArticle()
        {
			$this->data["titre"] = $this->antixss($this->data["titre"]);
            $this->data["contenu"] = $this->antixss($this->data["contenu"]);
            $this->data["auteur"] = $this->antixss($this->data["auteur"]);
            $c = new Article($this->data["titre"],$this->data["contenu"], $this->data["auteur"]);
            $this->msg = "Article updated succesfully";
            return $c;
        }




    }
?>
