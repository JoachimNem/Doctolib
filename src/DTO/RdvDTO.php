<?php

namespace App\DTO;

use OpenApi\Annotations as OA;

/**
 *     @OA\Schema(
 *     description="Le RdvDTO",
 *     title="Le RdvDTO",
 *     required={"date"},
 *     required={"heure"},
 *     required={"praticienDTO"},
          
 * )
 */

class RdvDTO
{
    private $id;
    /**
     * @OA\Property(
     *     description="The date of the rdv",
     *     title="date",
     * )
     */
    private $date;
    /**
     * @OA\Property(
     *     description="The hour of the rdv",
     *     title="heure",
     * )
     */
    private $heure;
    /**
     * @OA\Property(
     *     description="Le praticien qui suit le rdv",
     *     title="PraticienDTO",
     *     ref="#/components/schemas/PraticienDTO"
     * )
     */
    private $praticienDTO;
    private $praticienId;
    private $patientDTO;
    private $patientId;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }


    public function getPraticienDTO()
    {
        return $this->praticienDTO;
    }

    public function setPraticienDTO($praticienDTO)
    {
        $this->praticienDTO = $praticienDTO;

        return $this;
    }


    public function getPraticienId()
    {
        return $this->praticienId;
    }

    public function setPraticienId($praticienId)
    {
        $this->praticienId = $praticienId;

        return $this;
    }


    public function getPatientDTO()
    {
        return $this->patientDTO;
    }


    public function setPatientDTO($patientDTO)
    {
        $this->patientDTO = $patientDTO;

        return $this;
    }


    public function getPatientId()
    {
        return $this->patientId;
    }

    public function setPatientId($patientId)
    {
        $this->patientId = $patientId;

        return $this;
    }
}
