<?php

class CategorieModel {
    private $idCategorie;
    private $nomCategorie;
    private $codeCategorie;

    /**
     * @param $idCategorie
     * @param $nomCategorie
     * @param $codeCategorie
     */
    public function __construct($idCategorie, $nomCategorie, $codeCategorie) {
        $this->idCategorie = $idCategorie;
        $this->nomCategorie = $nomCategorie;
        $this->codeCategorie = $codeCategorie;
    }

    /**
     * @return mixed
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * @param mixed $idCategorie
     */
    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;
    }

    /**
     * @return mixed
     */
    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }

    /**
     * @param mixed $nomCategorie
     */
    public function setNomCategorie($nomCategorie)
    {
        $this->nomCategorie = $nomCategorie;
    }

    /**
     * @return mixed
     */
    public function getCodeCategorie()
    {
        return $this->codeCategorie;
    }

    /**
     * @param mixed $codeCategorie
     */
    public function setCodeCategorie($codeCategorie)
    {
        $this->codeCategorie = $codeCategorie;
    }



}