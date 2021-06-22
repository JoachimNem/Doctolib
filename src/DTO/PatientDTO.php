<?php

namespace App\DTO;

use OpenApi\Annotations as OA;

/**
 *     @OA\Schema(
 *     description="Le PatientDTO",
 *     title="Le PatientDTO",
 *     required={"email"}, 
 *     required={"mdp"},
 *     required={"adresse_num"},
 *     required={"prenom"},
 *     required={"telephone"},
 *     required={"date_naissance"},
 *     required={"adresse_num"},
 *     required={"adresse_rue"},
 *     required={"adresse_cp"},
 *     required={"adresse_ville"},

 * )
 */

class PatientDTO
{

    private $id;
    /**
     * @OA\Property(
     *     description="The Patient email",
     *     title="email",
     * )
     */
    private $email;
    /**
     * @OA\Property(
     *     description="The Patient password",
     *     title="mdp",
     * )
     */
    private $mdp;
    /**
     * @OA\Property(
     *     description="The Patient name",
     *     title="nom",
     * )
     */
    private $nom;
    /**
     * @OA\Property(
     *     description="The Patient firstname",
     *     title="prenom",
     * )
     */
    private $prenom;
    /**
     * @OA\Property(
     *     description="The Patient number phone",
     *     title="telephone",
     * )
     */
    private $telephone;
    /**
     * @OA\Property(
     *     description="The Patient birthday",
     *     title="date_naissance",
     * )
     */
    private $date_naissance;
    /**
     * @OA\Property(
     *     description="The Patient adress number",
     *     title="adresse_num",
     * )
     */
    private $adresse_num;
    /**
     * @OA\Property(
     *     description="The Patient adress street",
     *     title="adresse_rue",
     * )
     */
    private $adresse_rue;
    /**
     * @OA\Property(
     *     description="The Patient adress postal code",
     *     title="adresse_cp",
     * )
     */
    private $adresse_cp;
    /**
     * @OA\Property(
     *     description="The Patient adress city",
     *     title="adresse_ville",
     * )
     */
    private $adresse_ville;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

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

    public function getMdp()
    {
        return $this->mdp;
    }

    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
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

    public function getTelephone()
    {
        return $this->telephone;
    }


    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }


    public function getDateNaissance()
    {
        return $this->date_naissance;
    }


    public function setDateNaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }


    public function getAdresseNum()
    {
        return $this->adresse_num;
    }


    public function setAdresseNum($adresse_num)
    {
        $this->adresse_num = $adresse_num;

        return $this;
    }


    public function getAdresseRue()
    {
        return $this->adresse_rue;
    }


    public function setAdresseRue($adresse_rue)
    {
        $this->adresse_rue = $adresse_rue;

        return $this;
    }


    public function getAdresseCp()
    {
        return $this->adresse_cp;
    }


    public function setAdresseCp($adresse_cp)
    {
        $this->adresse_cp = $adresse_cp;

        return $this;
    }


    public function getAdresseVille()
    {
        return $this->adresse_ville;
    }


    public function setAdresseVille($adresse_ville)
    {
        $this->adresse_ville = $adresse_ville;

        return $this;
    }
}
