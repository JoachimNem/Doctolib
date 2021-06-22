<?php

namespace App\Controller;

use App\DTO\PraticienDTO;
use FOS\RestBundle\View\View;
use App\Service\PraticienService;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class PraticienController extends AbstractFOSRestController
{

    private $praticienService;

    public function __construct(PraticienService $praticienService)
    {
        $this->praticienService = $praticienService;
    }

    /**
     * @Get("/praticiens")
     */
    public function getAll()
    {
        $praticienDTOs = $this->praticienService->getAll();
        return View::create($praticienDTOs, 200, ["content-type" => "application/json"]);
    }

    /**
     * @Get("praticiens/{id}")
     */
    public function getById($id)
    {
        $praticien = $this->praticienService->getById($id);
        return View::create($praticien, 200);
    }

    /**
     * @Post("/praticiens")
     * @ParamConverter("praticien", converter="fos_rest.request_body")
     */
    public function create(PraticienDTO $praticienDTO)
    {
        $this->praticienService->create($praticienDTO);
        return View::create(null, 201);
    }

    /**
     * @Delete("supp/praticiens/{id}")
     */
    public function deleteById($id)
    {
        $this->praticienService->deleteById($id);
        return View::create(null, 200);
    }
}
