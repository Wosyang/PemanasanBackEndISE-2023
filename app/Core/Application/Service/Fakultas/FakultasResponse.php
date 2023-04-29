<?php

namespace App\Core\Application\Service\Fakultas;

use App\Core\Domain\Models\Departemen\Departemen;
use JsonSerializable;

class FakultasResponse implements JsonSerializable
{
    private string $id;
    private string $name;
    private string $singkatan;
    private Departemen $departemens;

    /**
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name, string $singkatan)
    {
        $this->id = $id;
        $this->name = $name;
        $this->singkatan = $singkatan;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'singkatan' => $this->singkatan
        ];
    }
}
