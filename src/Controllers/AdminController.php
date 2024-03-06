<?php

namespace App\Controllers;

use App\Contracts\CarsRepositoryContract;
use App\Repositories\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function __construct(
        private readonly CarsRepositoryContract $carRepository,
        private readonly Request $request
    ) {
    }

    const REDIRECT_URL = '/';

    public function catalog():Response
    {
        $this->onlyIsAdmin(static::REDIRECT_URL);

        $cars = $this->carRepository->getCars();
        return $this->view('pages/admin.php', ['cars' => $cars]);
    }

    public function edit(int $id): Response
    {
        $this->onlyIsAdmin(static::REDIRECT_URL);

        return $this->view('pages/edit.php', [
            'car' => $this->carRepository->load($id),
            'category' => CategoryRepository::getCategory()->toArray()
        ]);
    }

    public function create(): Response
    {
        $this->onlyIsAdmin(static::REDIRECT_URL);

        return $this->view('pages/create.php', ['category' => CategoryRepository::getCategory()->toArray()]);
    }

    public function save(int $id): Response
    {
        $this->onlyIsAdmin(static::REDIRECT_URL);

        $this->carRepository->update(array_merge(['id' => $id], $this->request->request->all()));
        return $this->catalog();
    }

    public function addCar(): Response
    {
        $this->onlyIsAdmin(static::REDIRECT_URL);

        $this->carRepository->addCar($this->request->request->all());
        return $this->catalog();
    }

    public function delete(int $id): Response
    {
        $this->onlyIsAdmin(static::REDIRECT_URL);

        $this->carRepository->destroy($id);
        return $this->catalog();
    }
}