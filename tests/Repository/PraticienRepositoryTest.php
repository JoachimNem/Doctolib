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
}
