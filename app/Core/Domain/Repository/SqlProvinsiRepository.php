<?php

namespace App\Core\Domain\Repository;

use App\Core\Domain\Models\Provinsi\Provinsi;
use Illuminate\Support\Facades\DB;

class SqlProvinsiRepository
{
    public function getAll(): array
    {
        $rows = DB::table('provinsi')->get();

        if (!$rows) {
            return null;
        }

        return $this->constructFromRows($rows->all());
    }

    public function find(int $id): ?Provinsi
    {
        $row = DB::table('provinsi')->where('id', $id)->first();

        if (!$row) {
            return null;
        }

        return $this->constructFromRows([$row])[0];
    }

    public function constructFromRows(array $rows): array
    {
        $provinsi = [];
        foreach ($rows as $row) {
            $provinsi[] = new Provinsi(
                $row->id,
                $row->name,
            );
        }
        return $provinsi;
    }
}
