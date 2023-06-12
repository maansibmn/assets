<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\AssetInterface;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public $assetRepository;

    public function __construct(AssetInterface $assetRepository)
    {
        $this->assetRepository = $assetRepository;
    }

    public function get($id) {
        $assetDetail = $this->assetRepository->getById($id);
        return response()->json(['success' => true, 'message' => 'Asset detail retrieved successfully', 'data' => $assetDetail]);
    }

}
