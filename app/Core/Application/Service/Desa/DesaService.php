<?php

namespace App\Core\Application\Service\Desa;

use App\Core\Application\Service\Desa\DesaResponse;
use App\Core\Domain\Repository\sqlDesaRepository;
use App\Core\Domain\Models\Desa\Desa;

class DesaService
{
    private sqlDesaRepository $repository;
    public function __construct(sqlDesaRepository $repository) {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        $desa = $this->repository->getAll();

        return array_map(function (Desa $result) {
            return new DesaResponse(
                $result->getId(),
                $result->getName()
            );
        }, $desa);
    }
}
