<?php

namespace App\Core\Application\Service\Fakultas;

use App\Core\Application\Service\Fakultas\FakultasResponse;
use App\Core\Domain\Repository\SqlFakultasRepository;
use App\Core\Domain\Models\Fakultas\Fakultas;

class FakultasService
{
    private SqlFakultasRepository $repository;
    public function __construct(SqlFakultasRepository $repository) {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        $fakultas = $this->repository->getAll();

        return array_map(function (Fakultas $result) {
            return new FakultasResponse(
                $result->getId(),
                $result->getName(),
                $result->getSingkatan()
            );
        }, $fakultas);
    }
}
