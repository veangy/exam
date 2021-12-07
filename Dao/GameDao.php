<?php
// fichier pour toutes les requetes SQL

// ------------------------ Connexion a la base de données -----------------------------------------
class GameDao
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
     * @return Game []
     */
    public function getAll(): array
    {
        $sth = $this->dbh->prepare("SELECT * FROM game");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        require_once '../Model/Game.php';

        foreach ($results as $key => $game) {
            $results[$key] = (new Game())
                ->setIdGame($game['id'])
                ->setTitle($game['title'])
                ->setMinPlayers($game['min_players'])
                ->setMaxPlayers($game['max_players']);
        }

        return $results;
    }
// ------------------------ Fin select ALL -----------------------------------------


// ------------------------ Select where id = $_GET['id'] -----------------------------------------
    public function getById(int $id_game): Game
    {
        $sth = $this->dbh->prepare("SELECT * FROM game WHERE id = :id");
        $sth->bindValue(':id', $id);
        $sth->execute();
        require_once '../Model/Game.php';
        return $sth->fetchObject(Game::class);
    }
        // ------------------------ Fin select where id = $_GET['id'] -----------------------------------------



        public function add(Game $game): int
    {
        $sth = $this->dbh->prepare("INSERT INTO game (title, min_players, max_players) VALUES (:title, :min_players, :max_players)");
        $sth->bindValue(':title', $game->getTitle());
        $sth->bindValue(':min_players', $game->getMinPlayers());
        $sth->bindValue(':max_players', $game->getMaxPlayers());
        $sth->execute();
        return $this->dbh->lastInsertId();
    }
}