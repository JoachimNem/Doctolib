<?php

namespace App\Service;

use App\DTO\PraticienDTO;
use App\Entity\Praticien;
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

    // GET

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
        $praticienDTO = (new PraticienMapper)->convertPraticienEntityToPraticienDTO($praticien);
        return $praticienDTO;
    }
    public function getByNom($nom)
    {
        $praticiens = $this->praticienRepository->findBy(['nom' => $nom]);
        $praticienDTOs = [];
        foreach ($praticiens as $praticien) {
            $mapper = new PraticienMapper();
            $praticienDTO = $mapper->convertPraticienEntityToPraticienDTO($praticien);
            $praticienDTOs[] = $praticienDTO;
        }
        return $praticienDTOs;
    }

    public function getByVille($ville)
    {
        $praticiens = $this->praticienRepository->findBy(['adresse_ville' => $ville]);
        $praticienDTOs = [];
        foreach ($praticiens as $praticien) {
            $mapper = new PraticienMapper();
            $praticienDTO = $mapper->convertPraticienEntityToPraticienDTO($praticien);
            $praticienDTOs[] = $praticienDTO;
        }
        return $praticienDTOs;
    }
    public function getBySpecialite($specialite)
    {
        $praticiens = $this->praticienRepository->findBy(['specialite' => $specialite]);
        $praticienDTOs = [];
        foreach ($praticiens as $praticien) {
            $mapper = new PraticienMapper();
            $praticienDTO = $mapper->convertPraticienEntityToPraticienDTO($praticien);
            $praticienDTOs[] = $praticienDTO;
        }
        return $praticienDTOs;
    }

    // POST

    public function create(PraticienDTO $praticienDTO)
    {
        $praticienToSave = (new PraticienMapper)->convertPraticienDTOToPraticienEntity($praticienDTO);
        $this->entityManager->persist($praticienToSave);
        $this->entityManager->flush();
    }

    // DELETE

    public function deleteById($id)
    {
        $praticien = $this->praticienRepository->find($id);
        $this->entityManager->remove($praticien);
        $this->entityManager->flush();
    }
}
