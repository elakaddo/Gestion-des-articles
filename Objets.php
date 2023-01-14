<?php
    set_include_path("./src");
    require_once('Router.php');
    require_once("view/View.php");
    require_once("control/Controller.php");
    require_once("model/Article.php");
    require_once("model/ArticleStorage.php");
    require_once("model/ArticleBuilder.php");
    require_once("model/ArticleStorageMySQL.php");
    require_once("lib/ObjectFileDB.php");
    
    require_once("../../private/mysql_config.php");
    $router = new Router();
    $d = "mysql:host=".MYSQL_HOST.";port=".MYSQL_PORT.";dbname=".MYSQL_DB.";charset=".MYSQL_CHARSET;
    $u = MYSQL_USER;
    $p = MYSQL_PASSWORD;
    $pdo = new PDO($d, $u, $p);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ArticleStor = new ArticleStorageMySQL($pdo);
    $router->main($ArticleStor);
?>