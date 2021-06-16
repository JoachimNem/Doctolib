<?php

namespace App\DataFixtures;

use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PatientFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 1; $i < 4; $i++) {
            $patient = new Patient();
            $patient->setNom("DUPOND $i")
                ->setPrenom("A")
                ->setTelephone(0606060606)
                ->setEmail("dupond@dupond.fr")
                ->setMdp("mdp")
                ->setDateNaissance(new \DateTime())
                ->setAdresseNum("5")
                ->setAdresseRue("boulevard de")
                ->setAdresseCp(59000)
                ->setAdresseVille("RBX");
            $manager->persist($patient);
        }

        $manager->flush();
    }
}
