<?php

namespace App\Core\Application\Service\Kecamatan;

use App\Core\Application\Service\Kecamatan\KecamatanResponse;
use App\Core\Domain\Repository\SqlKecamatanRepository;
use App\Core\Domain\Models\Kecamatan\Kecamatan;

class KecamatanService
{
    private SqlKecamatanRepository $repository;
    public function __construct(SqlKecamatanRepository $repository) {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        $kecamatan = $this->repository->getAll();

        return array_map(function (Kecamatan $result) {
            return new KecamatanResponse(
                $result->getId(),
                $result->getName()
            );
        }, $kecamatan);
    }
}
