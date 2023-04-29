<?php

namespace App\Core\Domain\Repository;

use App\Core\Domain\Models\Bank\Bank;
use Illuminate\Support\Facades\DB;

class SqlBankRepository
{
    public function getAll(): array
    {
        $rows = DB::table('list_bank')->get();

        if (!$rows) {
            return null;
        }

        return $this->constructFromRows($rows->all());
    }

    public function find(int $id): ?Bank
    {
        $row = DB::table('list_bank')->where('id', $id)->first();

        if (!$row) {
            return null;
        }

        return $this->constructFromRows([$row])[0];
    }

    public function constructFromRows(array $rows): array
    {
        $bank = [];
        foreach ($rows as $row) {
            $bank[] = new Bank(
                $row->id,
                $row->name,
            );
        }
        return $bank;
    }
}
