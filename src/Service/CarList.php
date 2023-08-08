<?php

namespace App\Service;

use App\Repository\CarRepository;

class CarList
{
    public function __construct(
        private readonly CarRepository $carRepository
    )
    {
    }

    public function allCar(array $data): array
    {
        return $this->carRepository->getAllCar($data);
    }
}