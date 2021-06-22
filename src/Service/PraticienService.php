<?php

namespace App\Service;

use App\DTO\PraticienDTO;
use App\Mapper\PraticienMapper;
use App\Repository\PraticienRepository;
use Doctrine\ORM\EntityManagerInterface;

class PraticienService
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

    public function getById($id)
    {
        $praticien = $this->praticienRepository->find($id);
        return $praticien;
    }


    public function create(PraticienDTO $praticienDTO)
    {
        $praticienToSave = (new PraticienMapper)->convertPraticienDTOToPraticienEntity($praticienDTO);
        $this->entityManager->persist($praticienToSave);
        $this->entityManager->flush();
    }

    public function deleteById($id)
    {
        $praticien = $this->praticienRepository->find($id);
        $this->entityManager->remove($praticien);
        $this->entityManager->flush();
    }
}
