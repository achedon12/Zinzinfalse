<?php

use Cassandra\Time;

class Partie{

    private int $noPartie;

    private int $score;

    private Time $time;

    private string $pseudo;

    /**
     * @param int $noPartie
     * @param int $score
     * @param Time $time
     * @param string $pseudo
     */
    public function __construct(int $noPartie, int $score, Time $time, string $pseudo)
    {
        $this->noPartie = $noPartie;
        $this->score = $score;
        $this->time = $time;
        $this->pseudo = $pseudo;
    }

    /**
     * @return int
     */
    public function getNoPartie(): int
    {
        return $this->noPartie;
    }

    /**
     * @param int $noPartie
     */
    public function setNoPartie(int $noPartie): void
    {
        $this->noPartie = $noPartie;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score): void
    {
        $this->score = $score;
    }

    /**
     * @return Time
     */
    public function getTime(): Time
    {
        return $this->time;
    }

    /**
     * @param Time $time
     */
    public function setTime(Time $time): void
    {
        $this->time = $time;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }




}