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

        $this->assertCount(3, $patients);
    }

    public function testFind()
    {
        self::bootKernel();
        $repository = self::$container->get(PatientRepository::class);
        $this->loadFixtures([PatientFixtures::class]);
        $patients = $repository->findAll();
        $result = $repository->find($patients[0]->getId());

        $this->assertEquals($patients[0]->getId(), $result->getId());
    }

    public function testFindOneBy()
    {
        self::bootKernel();
        $repository = self::$container->get(PatientRepository::class);
        $this->loadFixtures([PatientFixtures::class]);
        $patients = $repository->findAll();
        $tab["nom"] = $patients[0]->getNom();
        $result = $repository->findOneBy($tab);

        $this->assertEquals($patients[0]->getNom(), $result->getNom());
    }

    public function testFindBy()
    {
        self::bootKernel();
        $repository = self::$container->get(PatientRepository::class);
        $this->loadFixtures([PatientFixtures::class]);
        $tab["nom"] = "DUPONT 1";
        $patients = $repository->findBy($tab);

        $this->assertCount(1, $patients);
    }
}
