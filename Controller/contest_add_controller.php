<?php

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $startdate = strtotime( filter_input(INPUT_POST, 'startdate'));
    $gameid = filter_input(INPUT_POST, 'gameid');
//    $newformat = date('Y-m-d',$startdate);



    if (empty($error_messages)) {
        require_once '../Model/Contest.php';
        $contest = (new Contest())->setGameId(intval($gameid))->setStartDate(date('Y-m-d',$startdate));

        try {
            require_once '../Dao/contestDao.php';
            $dao = new contestDao();
            $id = $dao->add($contest);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        require_once '../view/contest_add.html.php';
    }
} elseif (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET') {
    require_once '../view/contest_add.html.php';
} else {
    echo 'Pas méthode POST ou GET';
}
