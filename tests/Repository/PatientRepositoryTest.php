<?php

namespace App\Tests\Repository;

use App\DataFixtures\PatientFixtures;
use App\Repository\PatientRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class PatientRepositoryTest extends KernelTestCase
{

    use FixturesTrait;

    public function testFindAll()
    {
        self::bootKernel();
        $repository = self::$container->get(PatientRepository::class);
        $this->loadFixtures([PatientFixtures::class]);
        $patients = $repository->findAll();

        $this->assertCount(5, $patients);
    }
}
