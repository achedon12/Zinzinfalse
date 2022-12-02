<?php
class Reponse{

    private string $noReponse;

    private string $question;

    private string $libelle;

    private bool $bonne_reponse;

    /**
     * @param string $noReponse
     * @param string $question
     * @param string $libelle
     *
     */
    public function __construct(string $noReponse, string $question, string $libelle, bool $bonne_reponse)
    {
        $this->noReponse = $noReponse;
        $this->question = $question;
        $this->libelle = $libelle;
        $this->bonne_reponse = $bonne_reponse;
    }

    /**
     * @return string
     */
    public function getNoReponse(): string
    {
        return $this->noReponse;
    }

    public function toForm(string $state): string
    {
        if ($state == "choixmultiple") {
            $res = "<input type='checkbox' id='" . $this->noReponse . "' name='" . $this->noReponse . "'>" .
            "<label for='" . $this->noReponse . "'>" . $this->libelle . "</label>";
        }
        if ($state == "choixunique") {
            $res = "<input type='radio' id='" . $this->noReponse . "' name='" . $this->question . "'>" .
                "<label for='" . $this->noReponse . "'>" . $this->libelle . "</label>";
        }
        if ($state == "vraifaux"){
            $res = "<input type='radio' id='" . $this->noReponse . "' name='" . $this->noReponse . "'>" .
            "<label for='" . $this->noReponse . "'>faux</label>".
                "<input type='radio' id='" . $this->noReponse . "' name='" . $this->noReponse . "'>" .
                "<label for='" . $this->noReponse . "'>vrai</label>";
        }
        return $res;
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