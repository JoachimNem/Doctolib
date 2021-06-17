<?php

namespace App\Tests\Repository;

use App\DataFixtures\RdvFixtures;
use App\Repository\RdvRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class RdvRepositoryTest extends KernelTestCase
{

    use FixturesTrait;

    public function testFindAll()
    {
        self::bootKernel();
        $repository = self::$container->get(RdvRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $rdvs = $repository->findAll();

        $this->assertCount(3, $rdvs);
    }

    public function testFind()
    {
        self::bootKernel();
        $repository = self::$container->get(RdvRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $rdvs = $repository->findAll();
        $result = $repository->find($rdvs[0]->getId());

        $this->assertEquals($rdvs[0]->getId(), $result->getId());
    }

    public function testFindOneBy()
    {
        self::bootKernel();
        $repository = self::$container->get(RdvRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $rdvs = $repository->findAll();
        $tab["date"] = $rdvs[0]->getDate();
        $result = $repository->findOneBy($tab);

        $this->assertEquals($rdvs[0]->getDate(), $result->getDate());
    }

    public function testFindBy()
    {
        self::bootKernel();
        $repository = self::$container->get(RdvRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $tab["id"] = 2;
        $rdvs = $repository->findBy($tab);

        $this->assertCount(1, $rdvs);
    }
}
