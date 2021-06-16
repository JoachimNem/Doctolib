<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Patient;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

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
}
