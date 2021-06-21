<?php

namespace App\Controller;

use App\Entity\Patient;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;


use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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
     * @ParamConverter("patient", converter="fos_rest.request_body")
     */
    public function create(Patient $patient)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($patient);
        $manager->flush();
        return View::create(null, 200);
    }

    /** 
     * @Delete("patients/{id}")
     */
    public function deleteByID($id)
    {
        $patient = $this->getDoctrine()->getRepository(Patient::class)->find($id);
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($patient);
        $manager->flush();
        return View::create(null, 200);
    }
}
