<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\UserModel\Kundali;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class KundaliController extends Controller
{
    public function getPanchang(Request $request)
    {
        // Artisan::call('cache:clear');
        $panchangDate=$request->panchangDate?:Carbon::now();


        // $getPanchang = Http::withoutVerifying()->post(url('/') . '/api/get/panchang', [
        //     'panchangDate' => $panchangDate,
        // ])->json();
        // // dd($getPanchang);

        // return view('frontend.pages.panchang', [
        //     'getPanchang' => $getPanchang,

        // ]);

        // {
            $api_key=DB::table('systemflag')->where('name','vedicAstroAPI')->first();
    
            // dd($api_key);
    
            try {
                $curl = curl_init();
                $date = date('d/m/Y',strtotime($panchangDate));
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.vedicastroapi.com/v3-json/panchang/panchang?api_key='.$api_key->value.'&date='.$date.'&tz=5.5&lat=11.2&lon=77.00&time=05%3A20&lang=en',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $getPanchang = json_decode($response, true); // Convert to associative array
                // print_r($response);die;
                $data['recordList'] = $getPanchang;
                return view('frontend.pages.panchang', [
                    'getPanchang' => $data,
        
                ]);

                // return response()->json([
                //     'recordList' => json_decode($response),
                //     'status' => 200,
                // ], 200);
            } catch (\Exception$e) {
                return response()->json([
                    'error' => false,
                    'message' => $e->getMessage(),
                    'status' => 500,
                ], 500);
            }
        // }
    }

    // public function getkundali(Request $request)
    // {
    //     Artisan::call('cache:clear');

    //     $session = new Session();
    //     $token = $session->get('token');


    //     $getkundaliprice = Http::withoutVerifying()->post(url('/') . '/api/pdf/price', [
    //         'token' => $token,
    //     ])->json();

    //     $getkundali = Http::withoutVerifying()->post(url('/') . '/api/getkundali', [
    //         'token' => $token,
    //     ])->json();

    //     $getsystemflag = Http::withoutVerifying()->post(url('/') . '/api/getSystemFlag')->json();
    //     $getsystemflag = collect($getsystemflag['recordList']);
    //     $currency = $getsystemflag->where('name', 'currencySymbol')->first();
    //         // dd( $getkundaliprice);

    //     return view('frontend.pages.kundali', [
    //         'getkundali' => $getkundali,
    //         'getkundaliprice' => $getkundaliprice,
    //         'currency' => $currency,

    //     ]);
    // }

    public function kundaliMatch(Request $request)
    {

        return view('frontend.pages.kundali-matching', [


        ]);
    }

    // public function kundaliMatchReport(Request $request)
    // {
    //     $KundaliMatching = Http::withoutVerifying()->post(url('/') . '/api/KundaliMatching/report', [
    //         'male_kundli_id' => $request->male_kundli_id,
    //         'female_kundli_id' => $request->female_kundli_id,
    //     ])->json();

    //     $kundalimale = Kundali::where('id', $request->male_kundli_id)->first();
    //     $kundalifemale = Kundali::where('id', $request->female_kundli_id)->first();
    //     // dd($kundalimale);

    //     return view('frontend.pages.kundali-match-report', [
    //         'KundaliMatching' => $KundaliMatching,
    //         'kundalimale' => $kundalimale,
    //         'kundalifemale' => $kundalifemale,

    //     ]);
    // }


    // public function kundaliReport(Request $request)
    // {
    //      $KundaliReport = Http::withoutVerifying()->post(url('/') . '/api/kundali/getKundaliReport', [
    //         'kundali_id' => $request->kundali_id,
    //         'lang'=>$request->lang
    //     ])->json();
    //     // dd($KundaliReport);
    //     return view('frontend.pages.kundali-report',compact('KundaliReport'));
    // }


}
