<?php

namespace App\Service;

use App\DTO\PatientDTO;
use App\Mapper\PatientMapper;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;

class PatientService
{

    private $patientRepository;
    private $entityManager;

    public function __construct(
        PatientRepository $repo,
        EntityManagerInterface $manager
    ) {
        $this->patientRepository = $repo;
        $this->entityManager = $manager;
    }


    public function getAll(): array
    {
        $patients = $this->patientRepository->findAll();
        $patientDTOs = [];
        foreach ($patients as $patient) {
            $mapper = new PatientMapper();
            $patientDTO = $mapper->convertPatientEntityToPatientDTO($patient);
            $patientDTOs[] = $patientDTO;
        }
        return $patientDTOs;
    }

    public function getById($id)
    {
        $patient = $this->patientRepository->find($id);
        return $patient;
    }


    public function create(PatientDTO $patientDTO)
    {
        $patientToSave = (new PatientMapper)->convertPatientDTOToPatientEntity($patientDTO);
        $this->entityManager->persist($patientToSave);
        $this->entityManager->flush();
    }

    public function deleteById($id)
    {
        $patient = $this->patientRepository->find($id);
        $this->entityManager->remove($patient);
        $this->entityManager->flush();
    }

    public function getRdvById($id)
    {
        //         $patient = $this->patientRepository->find($id);
        //         $rdvs = $patient->getRdvs();
        //         $rdvsEncoded= $rdvs->json_encode($rdvs);

        //         foreach ($rdvs as $rdvsEncoded) {

        //             $mapper = new PatientMapper();
        //             $praticienDTO = $mapper->convertPraticienEntityToPraticienDTO($praticien);
        //             $praticienDTOs[] = $praticienDTO;
        //         }
        return;
    }
}
