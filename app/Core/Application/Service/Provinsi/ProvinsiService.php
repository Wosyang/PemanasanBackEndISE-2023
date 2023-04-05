<?php

namespace App\Core\Application\Service\Provinsi;

use App\Core\Application\Service\Provinsi\ProvinsiResponse;
use App\Core\Domain\Repository\SqlProvinsiRepository;
use App\Core\Domain\Models\Provinsi\Provinsi;

class ProvinsiService
{
    private SqlProvinsiRepository $repository;
    public function __construct(SqlProvinsiRepository $repository) {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        $provinsi = $this->repository->getAll();

        return array_map(function (Provinsi $result) {
            return new ProvinsiResponse(
                $result->getId(),
                $result->getName()
            );
        }, $provinsi);
    }
}
