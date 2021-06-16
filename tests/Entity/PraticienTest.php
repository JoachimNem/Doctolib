<?php

use PHPUnit\Framework\TestCase;
use App\Entity\Praticien;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class PraticientTest extends KernelTestCase
{
    public function testSetNom()
    {
        $praticien = new Praticien();
        $praticien->setNom("DUPOND");
        $nom = $praticien->getNom();

        $this->assertEquals("DUPOND", $nom, "setNom does not affect the right value.");
    }

    public function testGetNom()
    {
        $praticien = new Praticien();
        $praticien->setNom("DUPOND");
        $nom = $praticien->getNom();

        $this->assertEquals("DUPOND", $nom, "getNom returns a bad value.");
    }
    public function testNomIsInvalid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $praticien = new Praticien();
        $praticien->setNom("D");
        $errors = $validator->validate($praticien);

        $this->assertCount(1, $errors, "Une erreur est attendue car moins de 3 chars");
        $this->assertEquals(1, count($errors), "Une erreur est attendue car moins de 3 chars");
        $this->assertEquals("Your name must be at least 3 characters long", $errors[0]->getMessage());
    }

    public function testNomIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $praticien = new Praticien();
        $praticien->setNom("DUPOND");
        $errors = $validator->validate($praticien);

        $this->assertCount(0, $errors, "Une erreur est attendue car plus de 3 chars");
        $this->assertEquals(0, count($errors), "Une erreur est attendue car plus de 3 chars");
        // $this->assertEquals("Your name must be at least 3 characters long", $errors[0]->getMessage());
    }
}
