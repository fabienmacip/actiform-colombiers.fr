<?php

class ProgramAbdos
{
    use Modele;

    private $id;
    private $nom;
    private $img;
    
    public function afficher($id)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM actiform_program_abdos WHERE id = ?');
        }
        $element = null;
        if ($stmt->execute([$id])) {
            $element = $stmt->fetchObject('ProgramAbdos',[$this->pdo]);
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

    public function getNom()
    {
        return $this->nom;
    }

    public function getImg()
    {
        return $this->img;
    }

}