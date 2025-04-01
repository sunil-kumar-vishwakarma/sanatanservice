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
use Illuminate\Support\Facades\Auth;
use App\Models\MstControl;
use DateTime;

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
            
            $gethoroscopesign['recordList']= $hororscopeSign->get();
            // print_r($hororscopeSign);die;
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
       
            $dt = Carbon::now()->format('Y-m-d');
            $yesterday = Carbon::yesterday()->format('Y-m-d');
            $tomorrow = Carbon::tomorrow()->format('Y-m-d');
            $mstData = MstControl::query()->get();
            $astroApiCallType = $mstData[0]->astro_api_call_type;

                $currentDate = new DateTime();
                $currentYear = $currentDate->format('Y');
                $currentDate->setISODate((int)$currentDate->format('o'), (int)$currentDate->format('W'), 1); // Set to the first day of the current week
                $startOfWeekFormatted = $currentDate->format('Y-m-d');

                $signRcd = DB::table('hororscope_signs')->where('id', $request->horoscopeSignId)->get();
                $signName = $signRcd[0]->name;
                $currentDate->modify('+6 days'); // Move to the last day of the current week
                $endOfWeekFormatted = $currentDate->format('Y-m-d');

                $startOfYear = new DateTime("$currentYear-01-01");
                $startOfYearFormatted = $startOfYear->format('Y-m-d');
                $endOfYear = new DateTime("$currentYear-12-31");
                $endOfYearFormatted = $endOfYear->format('Y-m-d');

                $langcode=$request->langcode?$request->langcode:'en';

                $todayHoroscope = Horoscope::selectRaw('horoscopes.*, REPLACE(lucky_color_code, "#", "0xff") AS color_code')
                ->where('zodiac', $signName)
                ->where('date', $dt)
                ->where('type', config('constants.DAILY_HORSCOPE'))
                ->where('langcode', $langcode)
                ->get();

                if ($todayHoroscope->isEmpty() && $langcode !== 'en') {
                    $todayHoroscope = Horoscope::selectRaw('horoscopes.*, REPLACE(lucky_color_code, "#", "0xff") AS color_code')
                        ->where('zodiac', $signName)
                        ->where('date', $dt)
                        ->where('type', config('constants.DAILY_HORSCOPE'))
                        ->where('langcode', 'en')
                        ->get();
                }

              // Fetching weekly horoscope
                $weeklyHoroScope = Horoscope::selectRaw('horoscopes.*, REPLACE(lucky_color_code, "#", "0xff") AS color_code')
                ->where('zodiac', $signName)
                ->where('start_date', '>=', $startOfWeekFormatted)
                ->where('end_date', '<=', $endOfWeekFormatted)
                ->where('type', config('constants.WEEKLY_HORSCOPE'))
                ->where('langcode', $langcode)
                ->get();


                if ($weeklyHoroScope->isEmpty() && $langcode !== 'en') {
                $weeklyHoroScope = Horoscope::selectRaw('horoscopes.*, REPLACE(lucky_color_code, "#", "0xff") AS color_code')
                    ->where('zodiac', $signName)
                    ->where('start_date', '>=', $startOfWeekFormatted)
                    ->where('end_date', '<=', $endOfWeekFormatted)
                    ->where('type', config('constants.WEEKLY_HORSCOPE'))
                    ->where('langcode', 'en')
                    ->get();
                }

                // Fetching yearly horoscope
                $yearlyHoroScope = Horoscope::selectRaw('horoscopes.*, REPLACE(lucky_color_code, "#", "0xff") AS color_code')
                ->where('zodiac', $signName)
                ->where('start_date', '>=', $startOfYearFormatted)
                ->where('end_date', '<=', $endOfYearFormatted)
                ->where('type', config('constants.YEARLY_HORSCOPE'))
                ->where('langcode', $langcode)
                ->get();


                if ($yearlyHoroScope->isEmpty() && $langcode !== 'en') {
                $yearlyHoroScope = Horoscope::selectRaw('horoscopes.*, REPLACE(lucky_color_code, "#", "0xff") AS color_code')
                    ->where('zodiac', $signName)
                    ->where('start_date', '>=', $startOfYearFormatted)
                    ->where('end_date', '<=', $endOfYearFormatted)
                    ->where('type', config('constants.YEARLY_HORSCOPE'))
                    ->where('langcode', 'en')
                    ->get();
                }

                $horo2 = array(
                    'todayHoroscope' => $todayHoroscope,
                    'weeklyHoroScope' => $weeklyHoroScope,
                    'yearlyHoroScope' => $yearlyHoroScope
                );
               
       
                $horoscope['vedicList'] = $horo2;
                $horoscope['astroApiCallType'] = $astroApiCallType;

                // print_r($horoscope['vedicList']);die;

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
                
                $gethoroscopesign['recordList']= $hororscopeSign->get();
                // print_r($hororscopeSign);die;
                $gethoroscopesign['totalRecords']= $hororscopeSignCount;

            // print_r($gethoroscopesign);die;

        $signRcd = DB::table('hororscope_signs')->where('id', $request->horoscopeSignId)->get();

        // print_r($horoscope);die;


        return view('frontend.pages.dailyhoroscope', [
            'horoscope' => $horoscope,
            'gethoroscopesign' => $gethoroscopesign,
            'signRcd' => $signRcd,

        ]);
    }
}
