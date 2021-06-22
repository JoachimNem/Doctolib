<?php

namespace App\Service;

use App\DTO\PraticienDTO;
use App\Mapper\PraticienMapper;
use App\Repository\PraticienRepository;
use Doctrine\ORM\EntityManagerInterface;

class PatientService
{

    private $praticienRepository;
    private $entityManager;

    public function __construct(
        PraticienRepository $repo,
        EntityManagerInterface $manager
    ) {
        $this->praticienRepository = $repo;
        $this->entityManager = $manager;
    }


    public function getAll(): array
    {
        $praticiens = $this->praticienRepository->findAll();
        $praticienDTOs = [];
        foreach ($praticiens as $praticien) {
            $mapper = new PraticienMapper();
            $praticienDTO = $mapper->convertPraticienEntityToPraticienDTO($praticien);
            $praticienDTOs[] = $praticienDTO;
        }
        return $praticienDTOs;
    }


    public function save(PraticienDTO $patientDTO)
    {

        $selectedMedecin = $this->medecinRepository->find($patientDTO->getMedecinId());
        if ($selectedMedecin == null) {
            return false;
        }
        $patientToSave = (new PatientMapper)->convertPatientDTOToPatientEntity($patientDTO);
        $patientToSave->setMedecin($selectedMedecin);
        $this->entityManager->persist($patientToSave);
        $this->entityManager->flush();
        return true;
    }
}
