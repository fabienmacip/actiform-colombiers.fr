<?php

class ProgramClientFessiers
{
    use Modele;

    private $id;
    private $idclient;
    private $idfessiers;
    private $series1;
    private $repetitions1;
    private $charge1;
    private $series2;
    private $repetitions2;
    private $charge2;
    private $series3;
    private $repetitions3;
    private $charge3;
    private $series4;
    private $repetitions4;
    private $charge4;

    
    public function afficher($id)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM actiform_program_client_fessiers WHERE id = ?');
        }
        $element = null;
        if ($stmt->execute([$id])) {
            $element = $stmt->fetchObject('ProgramClientFessiers',[$this->pdo]);
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

    public function getIdFessiers()
    {
        return $this->idfessiers;
    }

    
    public function getSeries1()
    {
        return $this->series1;
    }
    
    public function getRepetitions1()
    {
        return $this->repetitions1;
    }
    
    public function getCharge1()
    {
        return $this->charge1;
    }

    public function getSeries2()
    {
        return $this->series2;
    }
    
    public function getRepetitions2()
    {
        return $this->repetitions2;
    }

    public function getCharge2()
    {
        return $this->charge2;
    }

    public function getSeries3()
    {
        return $this->series3;
    }

    public function getRepetitions3()
    {
        return $this->repetitions3;
    }

    public function getCharge3()
    {
        return $this->charge3;
    }

    public function getSeries4()
    {
        return $this->series4;
    }

    public function getRepetitions4()
    {
        return $this->repetitions4;
    }

    public function getCharge4()
    {
        return $this->charge4;
    }

}