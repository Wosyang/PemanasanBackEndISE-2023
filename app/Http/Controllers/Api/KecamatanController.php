<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Core\Application\Service\Kecamatan\KecamatanService;
use Illuminate\Http\JsonResponse;

class KecamatanController extends Controller
{
    public function kecamatan(KecamatanService $service): JsonResponse
    {
        $response = $service->execute();
        return $this->successWithData($response, "Berhasil Mengambil Data Kecamatan");
    }
}
