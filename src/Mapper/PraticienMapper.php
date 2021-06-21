<?php

namespace App\Mapper;

use App\DTO\PraticienDTO;
use App\Entity\Praticien;

class PraticienMapper
{
    public function convertPraticienEntityToPraticienDTO(Praticien $praticien): PraticienDTO
    {
        $praticienDTO = (new PraticienDTO())->setId($praticien->getId())
            ->setNom($praticien->getNom());

        return $praticienDTO;
    }
}
