<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Core\Application\Service\Provinsi\ProvinsiService;
use Illuminate\Http\JsonResponse;

class ProvinsiController extends Controller
{
    public function provinsi(ProvinsiService $service): JsonResponse
    {
        $response = $service->execute();
        return $this->successWithData($response, "Berhasil Mengambil Data Provinsi");
    }
}
