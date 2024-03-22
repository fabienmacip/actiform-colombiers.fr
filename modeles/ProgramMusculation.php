<?php

class ProgramMusculation
{
    use Modele;

    private $id;
    private $nom;
    private $img;
    private $numeroappareil;
    
    public function afficher($id)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM actiform_program_musculation WHERE id = ?');
        }
        $element = null;
        if ($stmt->execute([$id])) {
            $element = $stmt->fetchObject('ProgramMusculation',[$this->pdo]);
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

    public function getNumeroAppareil()
    {
        return $this->numeroappareil;
    }

}