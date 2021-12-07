<?php
Class Game{
    private int $id;
    private string $title;
    private int $min_players;
    private int $max_players;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinPlayers(): int
    {
        return $this->min_players;
    }

    /**
     * @param int $min_players
     */
    public function setMinPlayers(int $min_players): self
    {
        $this->min_players = $min_players;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxPlayers(): int
    {
        return $this->max_players;
    }

    /**
     * @param int $max_players
     */
    public function setMaxPlayers(int $max_players): self
    {
        $this->max_players = $max_players;
        return $this;
    }

}