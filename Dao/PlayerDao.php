<?php
// fichier pour toutes les requetes SQL

// ------------------------ Connexion a la base de données -----------------------------------------
Class PlayerDao
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
        $sth = $this->dbh->prepare("SELECT * FROM player");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        require_once '../Model/Player.php';

        foreach ($results as $key => $player) {
            $results[$key] = (new Player())
                ->setId($player['id'])
                ->setEmail($player['email'])
                ->setNickname($player['nickname']);
        }

        return $results;
    }
// ------------------------ Fin select ALL -----------------------------------------


// ------------------------ Select where id = $_GET['id'] -----------------------------------------
    public function getById(int $id): player
    {
        $sth = $this->dbh->prepare("SELECT * FROM article WHERE id = :id");
        $sth->bindValue(':id', $id);
        $sth->execute();
        require_once '../Model/Article.php';
        return $sth->fetchObject(player::class);
    }
// ------------------------ Fin select where id = $_GET['id'] -----------------------------------------

// ------------------------ Insert -----------------------------------------

    public function add(Player $player): int
    {
        $sth = $this->dbh->prepare("INSERT INTO player (email, nickname) VALUES (:email, :nickname)");
        $sth->bindValue(':email', $player->getEmail());
        $sth->bindValue(':nickname', $player->getNickname());
        $sth->execute();
        return $this->dbh->lastInsertId();
    }
    // ------------------------ Fin insert -----------------------------------------


}
