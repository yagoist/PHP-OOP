<?php

namespace App\Controllers;

use App\Contracts\CarsRepositoryContract;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiCarController extends Controller
{

    public function __construct(private CarsRepositoryContract $carRepository)
    {
    }

    public function cars(): Response
    {
        return new JsonResponse($this->carRepository->getCars()->toArray());
    }
}