<?php

class ProgramAbdoss
{
    use Modele;

    // READ
    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM actiform_program_abdos ORDER BY id');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('ProgramAbdos',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }



}