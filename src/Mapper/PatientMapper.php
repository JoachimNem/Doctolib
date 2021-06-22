<?php

namespace App\Mapper;

use App\DTO\PatientDTO;
use App\Entity\Patient;

class PatientMapper
{

    public function convertPatientEntityToPatientDTO(Patient $patient): PatientDTO
    {
        $patientDTO = (new PatientDTO())->setId($patient->getId())
            ->setNom($patient->getNom());
        return $patientDTO;
    }
}
