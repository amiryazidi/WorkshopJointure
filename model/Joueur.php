<?php
class Joueur
{
    private ?int $idJoueur = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $email = null;
    private ?string $tel = null;

    public function __construct($id = null, $n, $p, $a, $d)
    {
        $this->idJoueur = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $a;
        $this->tel = $d;
    }


    public function getIdJoueur()
    {
        return $this->idJoueur;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getTel()
    {
        return $this->tel;
    }


    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }
}
