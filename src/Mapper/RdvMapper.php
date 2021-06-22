<?php

namespace App\Mapper;

use App\DTO\RdvDTO;
use App\Entity\Rdv;

class RdvMapper
{
    public function convertRdvEntityToRdvDTO(Rdv $rdv): RdvDTO
    {
        $praticienMapper = new PraticienMapper();
        $thePraticien = $rdv->getPraticien();
        $patientMapper = new PatientMapper();
        $thePatient = $rdv->getPatient();
        $rdvDTO = (new RdvDTO())
            ->setId($rdv->getId())
            ->setDate($rdv->getDate())
            ->setHeure($rdv->getHeure())
            ->setPraticienDTO($praticienMapper->convertPraticienEntityToPraticienDTO($thePraticien))
            ->setPatientDTO($patientMapper->convertPatientEntityToPatientDTO($thePatient));

        return $rdvDTO;
    }

    public function convetRdvDTOToRdvEntity(RdvDTO $rdvDTO): Rdv
    {
        $praticienMapper = new PraticienMapper();
        $thePraticienDTO = $rdvDTO->getPraticienDTO();
        $rdv = (new Rdv())
            ->setDate($rdvDTO->getDate())
            ->setHeure($rdvDTO->getHeure())
            ->setPraticien($praticienMapper->convertPraticienDTOToPraticienEntity($thePraticienDTO));
        return $rdv;
    }
}
