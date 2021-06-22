<?php

namespace App\Service;

use App\Repository\PatientRepository;
use App\Repository\PraticienRepository;
use App\Repository\RdvRepository;
use Doctrine\ORM\EntityManagerInterface;

class RdvService
{
    private $rdvRepository;
    private $praticienRepository;
    private $entityManager;

    public function __construct(
        RdvRepository $rdvRepo,
        PraticienRepository $praticienRepo,
        EntityManagerInterface $manager

    ) {
        $this->rdvRepository = $rdvRepo;
        $this->praticienRepository = $praticienRepo;
        $this->entityManager = $manager;
    }

    public function findAll(){

    }
}
