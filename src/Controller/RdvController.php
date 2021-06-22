<?php

namespace App\Controller;

use App\Entity\Rdv;
use App\Entity\Patient;
use App\Entity\Praticien;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class RdvController extends AbstractFOSRestController
{
    /**
     * 
     * @Get("/rdvs")
     * @return void
     */
    public function getAll()
    {
        $rdvs = $this->getDoctrine()->getRepository(Rdv::class)->findAll();
        return View::create($rdvs, 200, ["content-type" => "application/json"]);
    }

    /**
     * @Post("/rdvs")
     * @ParamConverter("rdv", converter="fos_rest.request_body")
     */
    public function create(Rdv $rdv)
    {
        $manager = $this->getDoctrine()->getManager();
        $repoPatient = $this->getDoctrine()->getRepository(Patient::class);
        $repoPraticien = $this->getDoctrine()->getRepository(Praticien::class);
        if ($repoPatient->find($rdv->getPatient()->getId()) == null || $repoPraticien->find($rdv->getPraticien()->getId()) == null) {
            $manager->persist($rdv->getPatient());
            $manager->persist($rdv->getPraticien());
        } else {
            $praticien = $repoPraticien->find($rdv->getPraticien()->getId());
            $patient = $repoPatient->find($rdv->getPatient()->getId());
            $rdv->setPatient($patient)->setPraticien($praticien);
        }

        $manager->persist($rdv);
        $manager->flush();
        return View::create(null, 200);
    }
}
