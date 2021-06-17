<?php

namespace App\DataFixtures;

use App\Entity\Rdv;
use App\Entity\Patient;
use App\Entity\Praticien;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RdvFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 1; $i < 4; $i++) {

            // Création Patient
            $patient = new Patient();
            $patient->setNom("DUPONT $i")
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

            // Création Praticien
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

            // Création Rdv
            $rdv = new Rdv();
            $rdv->setDate(new \DateTime)
                ->setHeure(new \DateTime)
                ->setPatient($patient)
                ->setPraticien($praticien);
            $manager->persist($rdv);
        }
        $manager->flush();
    }
}
