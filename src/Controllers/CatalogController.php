<?php

namespace App\Controllers;

use App\Contracts\CarsRepositoryContract;
use Symfony\Component\HttpFoundation\Response;

class CatalogController extends Controller
{
    public function __construct(private readonly CarsRepositoryContract $carRepository)
    {
    }

    public function catalog():Response
    {
        $cars = $this->carRepository->getCars();
        return $this->view('pages/catalog.php', ['cars' => $cars]);
    }

    public function detail($id): Response
    {
        $car = $this->carRepository->load($id);

        return $this->view('pages/detail.php', ['car' => $car]);
    }
}