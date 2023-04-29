<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Core\Application\Service\Fakultas\FakultasService;
use Illuminate\Http\JsonResponse;

class FakultasController extends Controller
{
    public function fakultas(FakultasService $service): JsonResponse
    {
        $response = $service->execute();
        return $this->successWithData($response, "Berhasil Mengambil Data Fakultas");
    }
}
