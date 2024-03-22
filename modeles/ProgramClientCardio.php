<?php

class ProgramClientCardio
{
    use Modele;

    private $id;
    private $idClient;
    private $idCardio;
    private $numSeance;
    private $temps;
    private $niveau;
    private $resistance;
    
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
        return $this->idClient;
    }

    public function getIdCardio()
    {
        return $this->idCardio;
    }

    public function getNumSeance()
    {
        return $this->numSeance;
    }

    public function getTemps()
    {
        return $this->temps;
    }

    public function getNiveau()
    {
        return $this->niveau;
    }

    public function getResistance()
    {
        return $this->resistance;
    }


}