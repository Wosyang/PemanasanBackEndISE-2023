<?php

namespace App\Core\Application\Service\Bank;

use App\Core\Application\Service\Bank\BankResponse;
use App\Core\Domain\Repository\SqlBankRepository;
use App\Core\Domain\Models\Bank\Bank;

class BankService
{
    private SqlBankRepository $repository;
    public function __construct(SqlBankRepository $repository) {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        $bank = $this->repository->getAll();

        return array_map(function (Bank $result) {
            return new BankResponse(
                $result->getId(),
                $result->getName()
            );
        }, $bank);
    }
}
