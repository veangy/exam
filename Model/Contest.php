<?php
Class Contest{
    private int $id;
    private int $game_id;
    private date $start_date;
    private int $winner_id;

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
     * @return int
     */
    public function getGameId(): int
    {
        return $this->game_id;
    }

    /**
     * @param int $game_id
     */
    public function setGameId(int $game_id): self
    {
        $this->game_id = $game_id;
        return $this;
    }

    /**
     * @return date
     */
    public function getStartDate(): date
    {
        return $this->start_date;
    }

    /**
     * @param date $start_date
     */
    public function setStartDate(date $start_date): self
    {
        $this->start_date = $start_date;
        return $this;
    }

    /**
     * @return int
     */
    public function getWinnerId(): int
    {
        return $this->winner_id;
    }

    /**
     * @param int $winner_id
     */
    public function setWinnerId(int $winner_id): self
    {
        $this->winner_id = $winner_id;
        return $this;
    }

}