<?php

class ProgramMusculations
{
    use Modele;

    // READ
    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM actiform_program_musculation ORDER BY id');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('ProgramMusculation',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }



}