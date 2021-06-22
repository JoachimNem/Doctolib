<?php

namespace App\Mapper;

use App\DTO\PatientDTO;
use App\Entity\Patient;

class PatientMapper
{
    public function convertPatientEntityToPatientDTO(Patient $patient): PatientDTO
    {
        $patientDTO = (new PatientDTO())
            ->setId($patient->getId())
            ->setEmail($patient->getEmail())
            ->setMdp($patient->getMdp())
            ->setNom($patient->getNom())
            ->setPrenom($patient->getPrenom())
            ->setTelephone($patient->getTelephone())
            ->setDateNaissance($patient->getDateNaissance())
            ->setAdresseNum($patient->getAdresseNum())
            ->setAdresseRue($patient->getAdresseRue())
            ->setAdresseCp($patient->getAdresseCp())
            ->setAdresseVille($patient->getAdresseVille());

        return $patientDTO;
    }

    public function convertPatientDTOToPatientEntity(PatientDTO $patientDTO): Patient
    {
        $patient = (new Patient())
            ->setEmail($patientDTO->getEmail())
            ->setMdp($patientDTO->getMdp())
            ->setNom($patientDTO->getNom())
            ->setPrenom($patientDTO->getPrenom())
            ->setTelephone($patientDTO->getTelephone())
            ->setDateNaissance($patientDTO->getDateNaissance())
            ->setAdresseNum($patientDTO->getAdresseNum())
            ->setAdresseRue($patientDTO->getAdresseRue())
            ->setAdresseCp($patientDTO->getAdresseCp())
            ->setAdresseVille($patientDTO->getAdresseVille());

        return $patient;
    }
}
