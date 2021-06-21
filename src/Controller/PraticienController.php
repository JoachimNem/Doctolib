<?php

namespace App\Controller;

use App\DTO\PraticienDTO;
use App\Entity\Praticien;
use FOS\RestBundle\View\View;
use App\Mapper\PraticienMapper;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\POST;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class PraticienController extends AbstractFOSRestController
{
    /**
     * @Get("/praticiens")
     */
    public function getAll()
    {
        $praticiens = $this->getDoctrine()->getRepository(Praticien::class)->findAll();
        $praticienDTOs = [];
        foreach ($praticiens as $praticien) {
            $mapper = new PraticienMapper();
            $praticienDTO = $mapper->convertPraticienEntityToPraticienDTO($praticien);
            $praticienDTOs[] = $praticienDTO;
        }
        return View::create($praticiens, 200, ["content-type" => "application/json"]);
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
     * @ParamConverter("praticien", converter="fos_rest.request_body")
     */
    public function create(Praticien $praticien)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($praticien);
        $manager->flush();
        return View::create(null, 200);
    }

    /**
     * @Delete("supp/praticiens/{id}")
     */
    public function deleteByID($id)
    {
        $praticien = $this->getDoctrine()->getRepository(Praticien::class)->find($id);
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($praticien);
        $manager->flush();
        return View::create(null, 200);
    }
}
