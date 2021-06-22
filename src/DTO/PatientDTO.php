<?php

namespace App\DTO;

use Doctrine\Common\Collections\ArrayCollection;

class PatientDTO
{

    private $id;
    private $email;
    private $mdp;
    private $nom;
    private $prenom;
    private $telephone;
    private $date_naissance;
    private $adresse_num;
    private $adresse_rue;
    private $adresse_cp;
    private $adresse_ville;


    public function __construct()
    {
        $this->rdvs = new ArrayCollection();
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of mdp
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of date_naissance
     */
    public function getDate_naissance()
    {
        return $this->date_naissance;
    }

    /**
     * Set the value of date_naissance
     *
     * @return  self
     */
    public function setDate_naissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    /**
     * Get the value of adresse_num
     */
    public function getAdresse_num()
    {
        return $this->adresse_num;
    }

    /**
     * Set the value of adresse_num
     *
     * @return  self
     */
    public function setAdresse_num($adresse_num)
    {
        $this->adresse_num = $adresse_num;

        return $this;
    }

    /**
     * Get the value of adresse_rue
     */
    public function getAdresse_rue()
    {
        return $this->adresse_rue;
    }

    /**
     * Set the value of adresse_rue
     *
     * @return  self
     */
    public function setAdresse_rue($adresse_rue)
    {
        $this->adresse_rue = $adresse_rue;

        return $this;
    }

    /**
     * Get the value of adresse_cp
     */
    public function getAdresse_cp()
    {
        return $this->adresse_cp;
    }

    /**
     * Set the value of adresse_cp
     *
     * @return  self
     */
    public function setAdresse_cp($adresse_cp)
    {
        $this->adresse_cp = $adresse_cp;

        return $this;
    }

    /**
     * Get the value of adresse_ville
     */
    public function getAdresse_ville()
    {
        return $this->adresse_ville;
    }

    /**
     * Set the value of adresse_ville
     *
     * @return  self
     */
    public function setAdresse_ville($adresse_ville)
    {
        $this->adresse_ville = $adresse_ville;

        return $this;
    }
}
