<?php

namespace App\DTO;

use OpenApi\Annotations as OA;

/**
 *     @OA\Schema(
 *     description="Le PraticienDTO",
 *     title="Le PraticienDTO",
 *     required={"nom"},
          
 * )
 */

class PraticienDTO
{

    private $id;
    /**
     * @OA\Property(
     *     description="nom",
     *     title="nom"
     * )
     */
    private $email;
    private $mdp;
    private $nom;
    private $prenom;
    private $specialite;
    private $telephone;
    private $adresse_num;
    private $adresse_rue;
    private $adresse_cp;
    private $adresse_ville;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }


    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresseNum(): ?string
    {
        return $this->adresse_num;
    }

    public function setAdresseNum(string $adresse_num): self
    {
        $this->adresse_num = $adresse_num;

        return $this;
    }

    public function getAdresseRue(): ?string
    {
        return $this->adresse_rue;
    }

    public function setAdresseRue(string $adresse_rue): self
    {
        $this->adresse_rue = $adresse_rue;

        return $this;
    }

    public function getAdresseCp(): ?int
    {
        return $this->adresse_cp;
    }

    public function setAdresseCp(int $adresse_cp): self
    {
        $this->adresse_cp = $adresse_cp;

        return $this;
    }

    public function getAdresseVille(): ?string
    {
        return $this->adresse_ville;
    }

    public function setAdresseVille(string $adresse_ville): self
    {
        $this->adresse_ville = $adresse_ville;

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
}
