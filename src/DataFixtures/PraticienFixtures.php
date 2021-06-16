<?php

namespace App\DataFixtures;

use App\Entity\Praticien;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PraticienFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 1; $i < 4; $i++) {
            $praticien = new Praticien();
            $praticien->setNom("DUPOND $i")
                ->setPrenom("A")
                ->setSpecialite("Chirurgien")
                ->setTelephone(0606060606)
                ->setEmail("dupond@dupond.fr")
                ->setMdp("mdp")
                ->setAdresseNum("5")
                ->setAdresseRue("boulevard de")
                ->setAdresseCp(59000)
                ->setAdresseVille("RBX");
            $manager->persist($praticien);
        }

        $manager->flush();
    }
}
