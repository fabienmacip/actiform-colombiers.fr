<?php

class ProgramClientCardio
{
    use Modele;

    private $id;
    private $idclient;
    private $idcardio;
    private $temps1;
    private $niveau1;
    private $resistance1;
    private $temps2;
    private $niveau2;
    private $resistance2;
    private $temps3;
    private $niveau3;
    private $resistance3;
    private $temps4;
    private $niveau4;
    private $resistance4;
    
    public function afficher($id)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM actiform_program_client_cardio WHERE id = ?');
        }
        $element = null;
        if ($stmt->execute([$id])) {
            $element = $stmt->fetchObject('ProgramClientCardio',[$this->pdo]);
            if (!is_object($element)) {
                $element = null;
            }
        }
        $stmt->closeCursor();
        return $element;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdClient()
    {
        return $this->idclient;
    }

    public function getIdCardio()
    {
        return $this->idcardio;
    }

     public function getTemps1()
    {
        return $this->temps1;
    }

    public function getNiveau1()
    {
        return $this->niveau1;
    }

    public function getResistance1()
    {
        return $this->resistance1;
    }

    public function getTemps2()
    {
        return $this->temps2;
    }

    public function getNiveau2()
    {
        return $this->niveau2;
    }

    public function getResistance2()
    {
        return $this->resistance2;
    }

    public function getTemps3()
    {
        return $this->temps3;
    }

    public function getNiveau3()
    {
        return $this->niveau3;
    }

    public function getResistance3()
    {
        return $this->resistance3;
    }

    public function getTemps4()
    {
        return $this->temps4;
    }

    public function getNiveau4()
    {
        return $this->niveau4;
    }

    public function getResistance4()
    {
        return $this->resistance4;
    }


}