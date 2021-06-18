<?php

namespace App\Controller;

use App\Entity\Praticien;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\View\View;

class PraticienController extends AbstractFOSRestController
{
    /**
     * @Get("praticiens")
     */
    public function getAll()
    {
        $praticiens = $this->getDoctrine()->getRepository(Praticien::class)->findAll();
        return View::create($praticiens, 200);
    }
}
