<?php

class ProgramCardios
{
    use Modele;

    // READ
    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM actiform_program_cardio ORDER BY id');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('ProgramCardio',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }



}