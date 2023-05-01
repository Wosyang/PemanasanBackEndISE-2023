<?php

namespace App\Core\Domain\Repository;

use App\Core\Domain\Models\Kecamatan\Kecamatan;
use Illuminate\Support\Facades\DB;

class SqlKecamatanRepository
{
    public function getAll(): array
    {
        $rows = DB::table('kecamatan')->get();

        if (!$rows) {
            return null;
        }

        return $this->constructFromRows($rows->all());
    }

    public function find(int $id): ?Kecamatan
    {
        $row = DB::table('kecamatan')->where('id', $id)->first();

        if (!$row) {
            return null;
        }

        return $this->constructFromRows([$row])[0];
    }

    public function constructFromRows(array $rows): array
    {
        $kecamatan = [];
        foreach ($rows as $row) {
            $provinsi[] = new Kecamatan(
                $row->id,
                $row->name,
            );
        }
        return $kecamatan;
    }
}
