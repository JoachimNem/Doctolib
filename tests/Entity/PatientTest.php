<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Patient;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function PHPUnit\Framework\assertEquals;

class PatientTest extends KernelTestCase
{

    public function testSetNom()
    {
        $patient = new Patient();
        $patient->setNom("DUPOND");
        $nom = $patient->getNom();

        $this->assertEquals("DUPOND", $nom, "setNom does not affect the right value.");
    }

    public function testGetNom()
    {
        $patient = new Patient();
        $patient->setNom("DUPOND");
        $nom = $patient->getNom();

        $this->assertEquals("DUPOND", $nom, "getNom returns a bad value.");
    }

    public function testNomIsInvalid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setNom("DU");
        $errors = $validator->validate($patient);

        $this->assertCount(1, $errors, "Une erreur est attendue car moins de 3 chars");
        $this->assertEquals(1, count($errors), "Une erreur est attendue car moins de 3 chars");
        $this->assertEquals("Your name must be at least 3 characters long", $errors[0]->getMessage());
    }

    public function testNomIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setNom("DUPOND");
        $errors = $validator->validate($patient);

        $this->assertCount(0, $errors, "Une erreur est attendue car plus de 3 chars");
        $this->assertEquals(0, count($errors), "Une erreur est attendue car plus de 3 chars");
        // $this->assertEquals("Your name must be at least 3 characters long", $errors[0]->getMessage());
    }
    public function testSetGetPrenom()
    {
        $patient = new Patient;
        $patient->setPrenom("Charles");
        $prenom = $patient->getPrenom();

        $this->assertEquals("Charles", $prenom);
    }

    public function testSetGetDateNaissance()
    {
        $patient = new Patient;
        $date = new \DateTime;
        $patient->setDateNaissance($date);
        $date_naissance = $patient->getDateNaissance();

        $this->assertEquals($date, $date_naissance);
    }

    public function testSetGetTelephone()
    {
        $patient = new Patient();
        $patient->setTelephone(0606060606);
        $telephone = $patient->getTelephone();

        assertEquals(0606060606, $telephone);
    }

    public function testSetGetAdresse_num()
    {
        $patient = new Patient();
        $patient->setAdresseNum("5 bis");
        $adresse_num = $patient->getAdresseNum();

        assertEquals("5 bis", $adresse_num);
    }

    public function testSetGetAdresse_rue()
    {
        $patient = new Patient();
        $patient->setAdresseRue("rue de la paix");
        $adresse_rue = $patient->getAdresseRue();

        assertEquals("rue de la paix", $adresse_rue);
    }

    public function testSetGetAdresse_cp()
    {
        $patient = new Patient();
        $patient->setAdresseCp(59000);
        $adresse_cp = $patient->getAdresseCp();

        assertEquals(59000, $adresse_cp);
    }

    public function testSetGetAdresse_ville()
    {
        $patient = new Patient();
        $patient->setAdresseVille("RBX");
        $adresse_ville = $patient->getAdresseVille();

        assertEquals("RBX", $adresse_ville);
    }
}
