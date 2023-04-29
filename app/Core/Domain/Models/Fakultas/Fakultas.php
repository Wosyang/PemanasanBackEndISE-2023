<?php

namespace App\Core\Domain\Models\Fakultas;

use App\Core\Domain\Models\Departemen\Departemen;

class Fakultas
{
    private int $id;
    private string $name;
    private string $singkatan;
    private Departemen $departemen;

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name, string $singkatan, )
    {
        $this->id = $id;
        $this->name = $name;
        $this->singkatan = $singkatan;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSingkatan(): string
    {
        return $this->singkatan;
    }
}


