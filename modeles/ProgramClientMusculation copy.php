<?php

class ProgramClientMusculation
{
    use Modele;

    private $id;
    private $idClient;
    private $idCardio;
    private $numSeance;
    private $poids;
    private $series;
    private $repetitions;
    private $recuperation;
    
    public function afficher($id)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM actiform_program_client_musculation WHERE id = ?');
        }
        $element = null;
        if ($stmt->execute([$id])) {
            $element = $stmt->fetchObject('ProgramClientMusculation',[$this->pdo]);
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

    public function getPoids()
    {
        return $this->poids;
    }

    public function getSeries()
    {
        return $this->series;
    }

    public function getRepetitions()
    {
        return $this->repetitions;
    }

    public function getRecuperation()
    {
        return $this->recuperation;
    }
}