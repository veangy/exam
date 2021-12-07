<?php

// Instruction qui permet de récupérer les données dans la base de donnée wf3_blog
require_once '../Dao/PlayerDao.php';


try {

    $dao = new PlayerDao();
    $results = $dao->getAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}
require_once '../Dao/GameDao.php';
try {
    $daoG = new GameDao();
    $resultsg = $dao->getAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}


// Afficher les données récupérées
require "../view/home_2.html.php";