<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Praticien;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function PHPUnit\Framework\assertEquals;

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

    public function testSetGetPrenom()
    {
        $praticien = new Praticien;
        $praticien->setPrenom("Charles");
        $prenom = $praticien->getPrenom();

        $this->assertEquals("Charles", $prenom);
    }

    public function testSetGetSpecialite()
    {
        $praticien = new Praticien;
        $praticien->setSpecialite("Generaliste");
        $specialite = $praticien->getSpecialite();

        $this->assertEquals("Generaliste", $specialite);
    }

    public function testSetGetTelephone()
    {
        $praticien = new Praticien();
        $praticien->setTelephone(0606060606);
        $telephone = $praticien->getTelephone();

        assertEquals(0606060606, $telephone);
    }

    public function testSetGetAdresse_num()
    {
        $praticien = new Praticien();
        $praticien->setAdresseNum("5 bis");
        $adresse_num = $praticien->getAdresseNum();

        assertEquals("5 bis", $adresse_num);
    }

    public function testSetGetAdresse_rue()
    {
        $praticien = new Praticien();
        $praticien->setAdresseRue("rue de la paix");
        $adresse_rue = $praticien->getAdresseRue();

        assertEquals("rue de la paix", $adresse_rue);
    }

    public function testSetGetAdresse_cp()
    {
        $praticien = new Praticien();
        $praticien->setAdresseCp(59000);
        $adresse_cp = $praticien->getAdresseCp();

        assertEquals(59000, $adresse_cp);
    }

    public function testSetGetAdresse_ville()
    {
        $praticien = new Praticien();
        $praticien->setAdresseVille("RBX");
        $adresse_ville = $praticien->getAdresseVille();

        assertEquals("RBX", $adresse_ville);
    }
}
