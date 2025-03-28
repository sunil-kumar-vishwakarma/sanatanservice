<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Horoscope;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\UserModel\HororscopeSign;

class HoroscopeController extends Controller
{

    public function horoScope(Request $request)
    {
        Artisan::call('cache:clear');
        // $gethoroscopesign = Http::withoutVerifying()->post(url('/') . '/api/getHororscopeSign')->json();

        try {
          
            $hororscopeSign = HororscopeSign::query();
            if ($s = $request->input(key:'s')) {
                $hororscopeSign->whereRaw(sql:"name LIKE '%" . $s . "%' ");
            }
            $hororscopeSignCount = $hororscopeSign->count();
            $hororscopeSign->orderBy('id', 'DESC');
            if ($request->startIndex >= 0 && $request->fetchRecord) {

                $hororscopeSign->skip($request->startIndex);
                $hororscopeSign->take($request->fetchRecord);
            }

            // return response()->json([
            //     'recordList' => $hororscopeSign->get(),
            //     'status' => 200,
            //     'totalRecords' => $hororscopeSignCount,
            // ], 200);
            $gethoroscopesign['recordList']= $hororscopeSign;
            $gethoroscopesign['totalRecords']= $hororscopeSignCount;
            return view('frontend.pages.horoscopesign', [
                'gethoroscopesign' => $gethoroscopesign,
    
            ]);

        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }


        
    }

    public function dailyHoroscope(Request $request)
    {

        Artisan::call('cache:clear');
        $gethoroscopesign = Http::withoutVerifying()->post(url('/') . '/api/getHororscopeSign')->json();

        $horoscope = Http::withoutVerifying()->post(url('/') . '/api/getDailyHoroscope', [
            'horoscopeSignId' => $request->horoscopeSignId,
        ])->json();


        $signRcd = DB::table('hororscope_signs')->where('id', $request->horoscopeSignId)->get();




        return view('frontend.pages.dailyhoroscope', [
            'horoscope' => $horoscope,
            'gethoroscopesign' => $gethoroscopesign,
            'signRcd' => $signRcd,

        ]);
    }
}
