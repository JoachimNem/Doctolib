<?php

namespace App\Controller;

use App\DTO\PatientDTO;
use FOS\RestBundle\View\View;
use App\Service\PatientService;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use OpenApi\Annotations as OA;

class PatientController extends AbstractFOSRestController
{

    private $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    /**
     * @Get("/patients")
     */
    public function getAll()
    {
        $patientDTOs = $this->patientService->getAll();
        return View::create($patientDTOs, 200, ["content-type" => "application/json"]);
    }

    /**
     * @Get("patients/{id}")
     */
    public function getById($id)
    {
        $patient = $this->patientService->getById($id);
        return View::create($patient, 200);
    }
    /**
     * Add a new pet to the store
     * 
     * @OA\Post(
     *     path="/patients",
     *     tags={"patient"},
     *     operationId="create",
     *     @OA\Response(
     *         response=201,
     *         description="Patient created successfully"
     *     ),
     *  requestBody={"$ref": "#/components/requestBodies/PatientDTO"}
     * )
     * @Post("/patients")
     * @ParamConverter("patient", converter="fos_rest.request_body")
     */

    public function create(PatientDTO $patientDTO)
    {
        $this->patientService->create($patientDTO);
        return View::create(null, 201);
    }

    /**
     * @Delete("supp/patients/{id}")
     */
    public function deleteById($id)
    {
        $this->patientService->deleteById($id);
        return View::create(null, 200);
    }
}
