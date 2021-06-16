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
}
