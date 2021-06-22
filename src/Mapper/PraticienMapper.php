<?php

namespace App\Mapper;

use App\DTO\PraticienDTO;
use App\Entity\Praticien;

class PraticienMapper
{
    public function convertPraticienEntityToPraticienDTO(Praticien $praticien): PraticienDTO
    {
        $praticienDTO = (new PraticienDTO())
            ->setId($praticien->getId())
            ->setNom($praticien->getNom())
            ->setPrenom($praticien->getPrenom())
            ->setSpecialite($praticien->getSpecialite())
            ->setTelephone($praticien->getTelephone())
            ->setAdresseNum($praticien->getAdresseNum())
            ->setAdresseRue($praticien->getAdresseRue())
            ->setAdresseCp($praticien->getAdresseCp())
            ->setAdresseVille($praticien->getAdresseVille());

        return $praticienDTO;
    }

    public function convertPraticienDTOToPraticienEntity(PraticienDTO $praticienDTO): Praticien
    {
        $praticien = (new Praticien())
            ->setNom($praticienDTO->getNom())
            ->setPrenom($praticienDTO->getPrenom())
            ->setSpecialite($praticienDTO->getSpecialite())
            ->setTelephone($praticienDTO->getTelephone())
            ->setAdresseNum($praticienDTO->getAdresseNum())
            ->setAdresseRue($praticienDTO->getAdresseRue())
            ->setAdresseCp($praticienDTO->getAdresseCp())
            ->setAdresseVille($praticienDTO->getAdresseVille());

        return $praticien;
    }
}
