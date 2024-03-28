<?php

class ProgramFessierss
{
    use Modele;

    // READ
    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM actiform_program_fessiers ORDER BY id');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('ProgramFessiers',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }



}