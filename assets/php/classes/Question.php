<?php
class Question{

    private string $libelle;

    private string $type;

    private int $points;

    private array $reponses;

    /**
     * @param string $libelle
     * @param string $type
     * @param int $points
     */
    public function __construct(string $libelle, string $type, int $points, array $reponses)
    {
        $this->libelle = $libelle;
        $this->type = $type;
        $this->points = $points;
        $this->reponses = $reponses;
    }

    public function toForm(): string{
        $res = "<h3>".$this->libelle."</h3>";
        $res .= "<form method='post'>";
        $res .= "<section>";
        foreach ($this->reponses as $reponse){
            $res .= $reponse->toForm($this->type);
        }
        $res .= "</section>";
        $res .= "<button type='submit' onclick='check()'><i class='fa fa-caret-square-right'></i></button>";
        $res .= "</form>";

        return $res;
    }

    /**
     * @return string
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param int $points
     */
    public function setPoints(int $points): void
    {
        $this->points = $points;
    }




}