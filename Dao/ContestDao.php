<?php
// fichier pour toutes les requetes SQL

// ------------------------ Connexion a la base de données -----------------------------------------
class PlayerDao
{
    private PDO $dbh;

    public function __construct()
    {
        $this->dbh = new PDO(
            "mysql:host=localhost;dbname=wf3_php_final_vincent;charset=UTF8",
            "root",
            "", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }

    // ------------------------ Fin connexion -----------------------------------------


    // ------------------------ Select ALL -----------------------------------------
    /**
     * Récupères tous les articles de la BDD
     *
     * @return Article[]
     */
    public function getAll(): array
    {
        $sth = $this->dbh->prepare("SELECT * FROM contest");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        require_once '../Model/Contest.php';

        foreach ($results as $key => $contest) {
            $results[$key] = (new Contest())
                ->setId($contest['id'])
                ->setGameId($contest['game_id'])
                ->setStartDate($contest['start_date'])
                ->setWinnerId($contest['winner_id']);

        }

        return $results;
    }
// ------------------------ Fin select ALL -----------------------------------------


// ------------------------ Select where id = $_GET['id'] -----------------------------------------
    public function getById(int $id): contest
    {
        $sth = $this->dbh->prepare("SELECT * FROM contest WHERE id = :id");
        $sth->bindValue(':id', $id);
        $sth->execute();
        require_once '../Model/Contest.php';
        return $sth->fetchObject(contest::class);
    }
// ------------------------ Fin select where id = $_GET['id'] -----------------------------------------

// ------------------------ Insert -----------------------------------------

    public function add(Contest $contest): int
    {
        $sth = $this->dbh->prepare("INSERT INTO contest (game_id, start_date) VALUES (:game_id, :start_date)");
        $sth->bindValue(':game_id', $contest->getGameId());
        $sth->bindValue(':start_date', $contest->getStartDate);
        $sth->execute();
        return $this->dbh->lastInsertId();
    }
    // ------------------------ Fin insert -----------------------------------------


}
