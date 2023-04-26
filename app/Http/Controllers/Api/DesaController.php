<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Core\Application\Service\Desa\DesaService;
use Illuminate\Http\JsonResponse;

class DesaController extends Controller
{
    public function desa(DesaService $service): JsonResponse
    {
        $response = $service->execute();
        return $this->successWithData($response, "Berhasil Mengambil Data Desa");
    }
}
