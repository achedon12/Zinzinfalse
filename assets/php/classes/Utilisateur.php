<?php

class Utilisateur{


    private string $pseudo;

    private string $mail;

    private string $mdp;

    private string $validation;

    /**
     * @param string $pseudo
     * @param string $mail
     * @param string $mdp
     * @param string $validation
     */
    public function __construct(string $pseudo, string $mail, string $mdp, string $validation)
    {
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->mdp = $mdp;
        $this->validation = $validation;
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

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getMdp(): string
    {
        return $this->mdp;
    }

    /**
     * @param string $mdp
     */
    public function setMdp(string $mdp): void
    {
        $this->mdp = $mdp;
    }

    /**
     * @return string
     */
    public function getValidation(): string
    {
        return $this->validation;
    }

    /**
     * @param string $validation
     */
    public function setValidation(string $validation): void
    {
        $this->validation = $validation;
    }



}