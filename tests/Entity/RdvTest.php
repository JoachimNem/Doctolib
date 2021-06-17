<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Rdv;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function PHPUnit\Framework\assertEquals;

class RdvTest extends KernelTestCase
{

    public function testSetGetDate()
    {
        $rdv = new Rdv();
        $date = new \DateTime();
        $rdv->setDate($date);
        $dateRdv = $rdv->getDate();

        $this->assertEquals($date, $dateRdv);
    }

    public function testSetGetTime()
    {
        $rdv = new Rdv();
        $heure = new \DateTime();
        $rdv->setDate($heure);
        $heureRdv = $rdv->getDate();

        $this->assertEquals($heure, $heureRdv);
    }
}
