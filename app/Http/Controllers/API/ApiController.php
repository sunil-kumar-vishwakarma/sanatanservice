<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerManagement;
use App\Models\WisdomVideo;

class ApiController extends Controller
{
    //

    public function bannerList()
    {
        $banner = BannerManagement::all();
        try {
           
            return response()->json([
                'success' => true,
                'data' => $banner,
                'status' => 200,
            ], 200);
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    public function wisdomList()
    {
        $wisdom = WisdomVideo::all();
        try {
           
            return response()->json([
                'success' => true,
                'data' => $wisdom,
                'status' => 200,
            ], 200);
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

}
