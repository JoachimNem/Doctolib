<?php

namespace App\Tests\Repository;

use App\DataFixtures\PraticienFixtures;
use App\Repository\PraticienRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class PraticienRepositoryTest extends KernelTestCase
{

    use FixturesTrait;

    public function testFindAll()
    {
        self::bootKernel();
        $repository = self::$container->get(PraticienRepository::class);
        $this->loadFixtures([PraticienFixtures::class]);
        $praticiens = $repository->findAll();

        $this->assertCount(3, $praticiens);
    }

    public function testFind()
    {
        self::bootKernel();
        $repository = self::$container->get(PraticienRepository::class);
        $this->loadFixtures([PraticienFixtures::class]);
        $praticiens = $repository->findAll();
        $result = $repository->find($praticiens[0]->getId());

        $this->assertEquals($praticiens[0]->getId(), $result->getId());
    }

    public function testFindOneBy()
    {
        self::bootKernel();
        $repository = self::$container->get(PraticienRepository::class);
        $this->loadFixtures([PraticienFixtures::class]);
        $praticiens = $repository->findAll();
        $tab["nom"] = $praticiens[0]->getNom();
        $result = $repository->findOneBy($tab);

        $this->assertEquals($praticiens[0]->getNom(), $result->getNom());
    }

    public function testFindBy()
    {
        self::bootKernel();
        $repository = self::$container->get(PraticienRepository::class);
        $this->loadFixtures([PraticienFixtures::class]);
        $tab["nom"] = "DuPOND 1";
        $praticiens = $repository->findBy($tab);

        $this->assertCount(1, $praticiens);
    }
}
