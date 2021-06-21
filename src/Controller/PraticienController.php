<?php

namespace App\Controller;

use App\Entity\Praticien;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\POST;

use FOS\RestBundle\View\View;


class PraticienController extends AbstractFOSRestController
{
    /**
     * @Get("/praticiens")
     */
    public function getAll()
    {
        $praticiens = $this->getDoctrine()->getRepository(Praticien::class)->findAll();
        return View::create($praticiens, 200);
    }

    /**
     * @Get("praticiens/{id}")
     */
    public function getById($id)
    {
        $praticiens = $this->getDoctrine()->getRepository(Praticien::class)->find($id);
        return View::create($praticiens, 200);
    }

    /**
     * @Post("/praticiens")
     */
    public function create(Praticien $praticien)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($praticien);
        $manager->flush();
        return View::create(null, 200);
    }
}
