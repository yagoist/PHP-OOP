<?php

namespace App\Controllers;

use App\Contracts\CarsRepositoryContract;
use Symfony\Component\HttpFoundation\Response;

class PagesController extends Controller
{

    public function __construct(private CarsRepositoryContract $carRepository)
    {
    }

    public function home(): Response
    {
        $cars = $this->carRepository->getCars(4);
        return $this->view('pages/home.php', ['cars' => $cars]);
    }
}