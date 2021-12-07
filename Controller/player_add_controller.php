<?php

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $email = filter_input(INPUT_POST, 'email');
    $nickname = filter_input(INPUT_POST, 'nickname');

    if (empty(trim($email))) {
        $error_messages[] = 'Pas d email';
    }
    if (empty(trim($nickname))) {
        $error_messages[] = 'Pas de nickname';
    }

    if (empty($error_messages)) {
        require_once '../Model/Player.php';
        $player = (new Player())->setEmail($email)->setNickname($nickname);

        try {
            require_once '../Dao/PlayerDao.php';
            $dao = new PlayerDao();
            $id = $dao->add($player);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        require_once '../view/player_add.html.php';
    }
} elseif (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET') {
    require_once '../view/player_add.html.php';
} else {
    echo 'Pas méthode POST ou GET';
}
