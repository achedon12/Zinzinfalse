<?php

class Reponse{

    private string $noReponse;

    private string $question;

    private string $libelle;

    /**
     * @param string $noReponse
     * @param string $question
     * @param string $libelle
     */
    public function __construct(string $noReponse, string $question, string $libelle)
    {
        $this->noReponse = $noReponse;
        $this->question = $question;
        $this->libelle = $libelle;
    }

    /**
     * @return string
     */
    public function getNoReponse(): string
    {
        return $this->noReponse;
    }

    public function toForm(): string{
        return "<input type='radio' name='reponse' value='".$this->noReponse."'>".
            "<label for='".$this->noReponse."'>".$this->libelle."</label>";
    }

    /**
     * @param string $noReponse
     */
    public function setNoReponse(string $noReponse): void
    {
        $this->noReponse = $noReponse;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    /**
     * @return string
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }



}