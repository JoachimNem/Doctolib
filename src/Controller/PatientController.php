<?php

namespace App\Controller;

use App\Entity\Patient;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;

use FOS\RestBundle\View\View;

class PatientController extends AbstractFOSRestController
{
    /**
     * 
     * @Get("/patients")
     * @return void
     */
    public function getAll()
    {
        $patient = $this->getDoctrine()->getRepository(Patient::class)->findAll();
        return View::create($patient, 200, ["content-type" => "application/json"]);
    }

    /**
     * 
     * @Get("/patients/{id}")
     * 
     * @param int $id
     * @return void
     */

    public function getPatientById(Patient $patient)
    {
        return View::create($patient, 200, ["content-type" => "application/json"]);
    }
    // public function getById($id)
    // {
    //     $patientTrouve = $this->getDoctrine()->getRepository(Patient::class)->find($id);
    //     return View::create($patientTrouve, 200);
    // }

    /**
     * @Post("/patients")
     */
    public function create(Patient $patient)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($patient);
        $manager->flush();
        return View::create(null, 200);
    }
}
