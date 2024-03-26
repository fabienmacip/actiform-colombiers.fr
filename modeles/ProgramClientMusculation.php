<?php

class ProgramClientMusculation
{
    use Modele;

    private $id;
    private $idclient;
    private $idmusculation;
    private $poids1;
    private $series1;
    private $repetitions1;
    private $recuperation1;
    private $poids2;
    private $series2;
    private $repetitions2;
    private $recuperation2;
    private $poids3;
    private $series3;
    private $repetitions3;
    private $recuperation3;
    private $poids4;
    private $series4;
    private $repetitions4;
    private $recuperation4;

    
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
        return $this->idclient;
    }

    public function getIdMusculation()
    {
        return $this->idmusculation;
    }

    public function getPoids1()
    {
        return $this->poids1;
    }

    public function getSeries1()
    {
        return $this->series1;
    }

    public function getRepetitions1()
    {
        return $this->repetitions1;
    }

    public function getRecuperation1()
    {
        return $this->recuperation1;
    }

    public function getPoids2()
    {
        return $this->poids2;
    }

    public function getSeries2()
    {
        return $this->series2;
    }

    public function getRepetitions2()
    {
        return $this->repetitions2;
    }

    public function getRecuperation2()
    {
        return $this->recuperation2;
    }

    public function getPoids3()
    {
        return $this->poids3;
    }

    public function getSeries3()
    {
        return $this->series3;
    }

    public function getRepetitions3()
    {
        return $this->repetitions3;
    }

    public function getRecuperation3()
    {
        return $this->recuperation3;
    }

    public function getPoids4()
    {
        return $this->poids4;
    }

    public function getSeries4()
    {
        return $this->series4;
    }

    public function getRepetitions4()
    {
        return $this->repetitions4;
    }

    public function getRecuperation4()
    {
        return $this->recuperation4;
    }
}