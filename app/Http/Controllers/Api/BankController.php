<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Core\Application\Service\Bank\BankService;
use Illuminate\Http\JsonResponse;

class BankController extends Controller
{
    public function bank(BankService $service): JsonResponse
    {
        $response = $service->execute();
        return $this->successWithData($response, "Berhasil Mengambil Data Bank");
    }
}
