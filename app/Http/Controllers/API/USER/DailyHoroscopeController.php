<?php

namespace App\Http\Controllers\API\USER;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\MstControl;
use App\Models\Horoscope;
use DateTime;
use App\Models\UserModel\HororscopeSign;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;


define('DATEFORMAT', "(DATE_FORMAT(horoscopeDate,'%Y-%m-%d'))");

class DailyHoroscopeController extends Controller
{
    //  public function getDailyHoroscope(Request $req)
    // {
    //     try {
    //             $dt = Carbon::now()->format('Y-m-d');
    //             $yesterday = Carbon::yesterday()->format('Y-m-d');
    //             $tomorrow = Carbon::tomorrow()->format('Y-m-d');
    //             $mstData = MstControl::query()->get();
    //             $astroApiCallType = $mstData[0]->astro_api_call_type;

    //             $currentDate = new DateTime();
    //             $currentYear = $currentDate->format('Y');
    //             $currentDate->setISODate((int)$currentDate->format('o'), (int)$currentDate->format('W'), 1); // Set to the first day of the current week
    //             $startOfWeekFormatted = $currentDate->format('Y-m-d');

    //             $signRcd = DB::table('hororscope_signs')->where('id', $req->horoscopeSignId)->get();
    //             $signName = $signRcd[0]->name;
    //             $currentDate->modify('+6 days'); // Move to the last day of the current week
    //             $endOfWeekFormatted = $currentDate->format('Y-m-d');

    //             $startOfYear = new DateTime("$currentYear-01-01");
    //             $startOfYearFormatted = $startOfYear->format('Y-m-d');
    //             $endOfYear = new DateTime("$currentYear-12-31");
    //             $endOfYearFormatted = $endOfYear->format('Y-m-d');

    //             $langcode=$req->langcode?$req->langcode:'en';

    //             $todayHoroscope = Horoscope::selectRaw('horoscopes.*, REPLACE(lucky_color_code, "#", "0xff") AS color_code')
    //             ->where('zodiac', $signName)
    //             ->where('date', $dt)
    //             ->where('type', config('constants.DAILY_HORSCOPE'))
    //             ->where('langcode', $langcode)
    //             ->first();

    //             // if ($todayHoroscope->isEmpty() && $langcode !== 'en') {
    //             //     $todayHoroscope = Horoscope::selectRaw('horoscopes.*, REPLACE(lucky_color_code, "#", "0xff") AS color_code')
    //             //         ->where('zodiac', $signName)
    //             //         ->where('date', $dt)
    //             //         ->where('type', config('constants.DAILY_HORSCOPE'))
    //             //         ->where('langcode', 'en')
    //             //         ->fist();
    //             // }

    //             // print_r($todayHoroscope);die;
    //           // Fetching weekly horoscope
    //             $weeklyHoroScope = Horoscope::selectRaw('horoscopes.*, REPLACE(lucky_color_code, "#", "0xff") AS color_code')
    //             ->where('zodiac', $signName)
    //             ->where('start_date', '>=', $startOfWeekFormatted)
    //             ->where('end_date', '<=', $endOfWeekFormatted)
    //             ->where('type', config('constants.WEEKLY_HORSCOPE'))
    //             ->where('langcode', $langcode)
    //             ->get();


    //             if ($weeklyHoroScope->isEmpty() && $langcode !== 'en') {
    //             $weeklyHoroScope = Horoscope::selectRaw('horoscopes.*, REPLACE(lucky_color_code, "#", "0xff") AS color_code')
    //                 ->where('zodiac', $signName)
    //                 ->where('start_date', '>=', $startOfWeekFormatted)
    //                 ->where('end_date', '<=', $endOfWeekFormatted)
    //                 ->where('type', config('constants.WEEKLY_HORSCOPE'))
    //                 ->where('langcode', 'en')
    //                 ->get();
    //             }

    //             // Fetching yearly horoscope
    //             $yearlyHoroScope = Horoscope::selectRaw('horoscopes.*, REPLACE(lucky_color_code, "#", "0xff") AS color_code')
    //             ->where('zodiac', $signName)
    //             ->where('start_date', '>=', $startOfYearFormatted)
    //             ->where('end_date', '<=', $endOfYearFormatted)
    //             ->where('type', config('constants.YEARLY_HORSCOPE'))
    //             ->where('langcode', $langcode)
    //             ->get();


    //             if ($yearlyHoroScope->isEmpty() && $langcode !== 'en') {
    //             $yearlyHoroScope = Horoscope::selectRaw('horoscopes.*, REPLACE(lucky_color_code, "#", "0xff") AS color_code')
    //                 ->where('zodiac', $signName)
    //                 ->where('start_date', '>=', $startOfYearFormatted)
    //                 ->where('end_date', '<=', $endOfYearFormatted)
    //                 ->where('type', config('constants.YEARLY_HORSCOPE'))
    //                 ->where('langcode', 'en')
    //                 ->get();
    //             }

    //             $horo2 = array(
    //                 'todayHoroscope' => $todayHoroscope,
    //                 'weeklyHoroScope' => $weeklyHoroScope,
    //                 'yearlyHoroScope' => $yearlyHoroScope
    //             );
    //             return response()->json([
    //                 "message" => "get daily Horoscope",
    //                 'astroApiCallType' => $astroApiCallType,
    //               // "recordList" => $horo,
    //                 'vedicList' => $horo2,
    //                 'status' => 200,
    //             ], 200);
    //         // }
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'message' => $e->getMessage(),
    //             'status' => 500,
    //             'error' => false,
    //         ], 500);
    //     }
    // }

 public function getDailyHoroscope(Request $req)
{
    $date = date('d/m/Y');
    $currDate = $date; // standardize
    $zodiac = $req->horoscopeSignId;
    $lang = 'en';

    set_time_limit(300);

    $api_key = DB::table('systemflag')->where('name', 'vedicAstroAPI')->value('value');

    $horoscopeSign = DB::table('hororscope_signs')->where('id', $zodiac)->first();
    if (!$horoscopeSign) {
        return response()->json(['error' => 'Invalid horoscope sign ID'], 400);
    }

    $horoscope = Horoscope::where('zodiac', $horoscopeSign->name)
        ->where('langcode', $lang)
        ->first();

    if (!$horoscope || $horoscope->date != $currDate) {
        // API call only if new or outdated
        $dailyHoroscope = Http::get('https://api.vedicastroapi.com/v3-json/prediction/daily-moon', [
            'zodiac' => $zodiac,
            'date' => $date,
            'show_same' => true,
            'api_key' => $api_key,
            'lang' => $lang,
        ]);

        $data = $dailyHoroscope->json();

        if (!isset($data['response'])) {
            return response()->json(['error' => 'Invalid API response'], 500);
        }

        Horoscope::updateOrCreate(
            ['zodiac' => $data['response']['zodiac'], 'langcode' => $lang],
            [
                'total_score' => $data['response']['total_score'],
                'lucky_color' => $data['response']['lucky_color'],
                'lucky_color_code' => $data['response']['lucky_color_code'],
                'lucky_number' => json_encode($data['response']['lucky_number']),
                'physique' => $data['response']['physique'],
                'status' => $data['response']['status'],
                'finances' => $data['response']['finances'],
                'relationship' => $data['response']['relationship'],
                'career' => $data['response']['career'],
                'travel' => $data['response']['travel'],
                'family' => $data['response']['family'],
                'friends' => $data['response']['friends'],
                'health' => $data['response']['health'],
                'bot_response' => $data['response']['bot_response'],
                'date' => $currDate,
                'end_date' => null,
                'start_date' => null,
                'type' => config('constants.DAILY_HORSCOPE'),
            ]
        );
    }
 $horoscopeDaily = Horoscope::where('zodiac', $horoscopeSign->name)
        ->where('langcode', $lang)
        ->first();

        $horo2 = array(
                    'todayHoroscope' => $horoscopeDaily,
                    // 'weeklyHoroScope' => $weeklyHoroScope,
                    // 'yearlyHoroScope' => $yearlyHoroScope
                );
    //             return response()->json([
    //                 "message" => "get daily Horoscope",
    //                 'astroApiCallType' => $astroApiCallType,
    //               // "recordList" => $horo,
    //                 'vedicList' => $horo2,
    //                 'status' => 200,
    //             ], 200);

    return response()->json(['status'=>200,'message' => 'Horoscope stored successfully','vedicList'=>$horo2]);
}


public function getWeeklyHoroscope(Request $req)
{
    $currDate = date('d/m/Y');
    $zodiacId = $req->horoscopeSignId;
    $lang = 'en';

    set_time_limit(300);

    // Fetch API key
    $apiKey = DB::table('systemflag')->where('name', 'vedicAstroAPI')->value('value');

    // Get zodiac name
    $horoscopeSign = DB::table('hororscope_signs')->where('id', $zodiacId)->first();
    if (!$horoscopeSign) {
        return response()->json(['error' => 'Invalid horoscope sign ID'], 400);
    }

        $today = Carbon::createFromFormat('d/m/Y', $currDate);
        $startDate = $today->copy()->startOfWeek(Carbon::MONDAY)->format('d/m/Y');
        $endDate = $today->copy()->endOfWeek(Carbon::SUNDAY)->format('d/m/Y');

    // Check if horoscope already exists
    $existingHoroscope = Horoscope::where('zodiac', $horoscopeSign->name)
        ->where('langcode', $lang)
        ->where('start_date', '>=', $startDate)
        ->where('end_date', '<=', $endDate)
        ->where('type', config('constants.WEEKLY_HORSCOPE'))
        ->first();

        

    // Fetch from API if not exists or outdated
    if (!$existingHoroscope || $existingHoroscope->date !== $currDate) {

        $response = Http::get('https://api.vedicastroapi.com/v3-json/prediction/weekly-moon', [
            'zodiac' => $zodiacId,
            'date' => $currDate,
            'show_same' => true,
            'api_key' => $apiKey,
            'lang' => $lang,
            'week' => 'thisweek',
        ]);

        $data = $response->json();

        // print_r($data);die;
        if (!isset($data['response'])) {
            return response()->json(['error' => 'Invalid API response'], 500);
        }
        
        
        Horoscope::updateOrCreate(
            ['zodiac' => $data['response']['zodiac'], 'langcode' => $lang, 'type' => config('constants.WEEKLY_HORSCOPE')],
            [
                'total_score' => $data['response']['total_score'],
                'lucky_color' => $data['response']['lucky_color'],
                'lucky_color_code' => $data['response']['lucky_color_code'],
                'lucky_number' => json_encode($data['response']['lucky_number']),
                // 'physique' => $data['response']['physique'],
                'status' => $data['response']['status'],
                'finances' => $data['response']['finances'],
                'relationship' => $data['response']['relationship'],
                'career' => $data['response']['career'],
                'travel' => $data['response']['travel'],
                'family' => $data['response']['family'],
                'friends' => $data['response']['friends'],
                'health' => $data['response']['health'],
                'bot_response' => $data['response']['bot_response'],
                'date' => $currDate,
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]
        );
    }

    return response()->json(['status'=>200,'message' => 'Weekly horoscope stored or already up to date','weekly'=>$existingHoroscope]);
}


// public function getYearlyHoroscope(Request $req)
// {
//     $currDate = date('d/m/Y');
//     $year = date('Y');
//     $zodiacId = $req->horoscopeSignId;
//     $lang = 'en';

//     set_time_limit(300);

//     // Fetch API key
//     $apiKey = DB::table('systemflag')->where('name', 'vedicAstroAPI')->value('value');

//     // Get zodiac name
//     $horoscopeSign = DB::table('hororscope_signs')->where('id', $zodiacId)->first();
//     if (!$horoscopeSign) {
//         return response()->json(['error' => 'Invalid horoscope sign ID'], 400);
//     }
//                 $startOfYear = new DateTime("01-01-$year");
//                 $startOfYearFormatted = $startOfYear->format('d/m/Y');
//                 $endOfYear = new DateTime("31-12-$year");
//                 $endOfYearFormatted = $endOfYear->format('d/m/Y');

//     // Check if horoscope already exists
//     $existingHoroscope = Horoscope::where('zodiac', $horoscopeSign->name)
//         ->where('langcode', $lang)
//         ->where('start_date', '>=', $startOfYearFormatted)
//         ->where('end_date', '<=', $endOfYearFormatted)
//         ->where('type', config('constants.YEARLY_HORSCOPE'))
//         ->first();

        

//     // Fetch from API if not exists or outdated
//     if (!$existingHoroscope || $existingHoroscope->date !== $currDate) {

//         $response = Http::get('https://api.vedicastroapi.com/v3-json/prediction/yearly', [
//             'zodiac' => $zodiacId,
//             'date' => $currDate,
//             'show_same' => true,
//             'api_key' => $apiKey,
//             'lang' => $lang,
//             'year' => $year,
//         ]);

//         $data = $response->json();

//         // print_r($data);die;
//         if (!isset($data['response'])) {
//             return response()->json(['error' => 'Invalid API response'], 500);
//         }
        
//         foreach ($data['response'] as $value) {
//         Horoscope::updateOrCreate(
//             ['zodiac' => $horoscopeSign->name, 'langcode' => $lang, 'type' => config('constants.YEARLY_HORSCOPE')],
//             [
//                 'total_score' => isset($value['score']) ? substr($value['score'], 0, -1) : 0,
//                     'lucky_color' => $value['lucky_color'] ?? '',
//                     'lucky_color_code' => $value['lucky_color_code'] ?? '',
//                     'lucky_number' => $value['lucky_number'] ?? 0,
//                     'physique' => isset($value['physique']) ? json_encode($value['physique']) : '',
//                     'status' => isset($value['status']) ? json_encode($value['status']) : '',
//                     'finances' => isset($value['finances']) ? json_encode($value['finances']) : '',
//                     'relationship' => isset($value['relationship']) ? json_encode($value['relationship']) : '',
//                     'career' => isset($value['career']) ? json_encode($value['career']) : '',
//                     'travel' => isset($value['travel']) ? json_encode($value['travel']) : '',
//                     'family' => isset($value['family']) ? json_encode($value['family']) : '',
//                     'friends' => isset($value['friends']) ? json_encode($value['friends']) : '',
//                     'health' => isset($value['health']) ? json_encode($value['health']) : '',
//                     'bot_response' => isset($value['prediction']) ? (is_array($value['prediction']) ? json_encode($value['prediction']) : str_replace("'", "", $value['prediction'])) : '',
//                     'date' => $currDate,
//                     'type' => config('constants.YEARLY_HORSCOPE'),
//                     'start_date' => $startOfYearFormatted,
//                     'end_date' => $endOfYearFormatted,
//                     'health_remark' => isset($value['health']['prediction']) ? (is_array($value['health']['prediction']) ? json_encode($value['health']['prediction']) : $value['health']['prediction']) : "",
//                     'relationship_remark' => isset($value['relationship']['prediction']) ? (is_array($value['relationship']['prediction']) ? json_encode($value['relationship']['prediction']) : $value['relationship']['prediction']) : "",
//                     'travel_remark' => isset($value['travel']['prediction']) ? (is_array($value['travel']['prediction']) ? json_encode($value['travel']['prediction']) : $value['travel']['prediction']) : "",
//                     'family_remark' => isset($value['family']['prediction']) ? (is_array($value['family']['prediction']) ? json_encode($value['family']['prediction']) : $value['family']['prediction']) : "",
//                     'friends_remark' => isset($value['friends']['prediction']) ? (is_array($value['friends']['prediction']) ? json_encode($value['friends']['prediction']) : $value['friends']['prediction']) : "",
//                     'finances_remark' => isset($value['finances']['prediction']) ? (is_array($value['finances']['prediction']) ? json_encode($value['finances']['prediction']) : $value['finances']['prediction']) : "",
//                     'status_remark' => isset($value['status']['prediction']) ? (is_array($value['status']['prediction']) ? json_encode($value['status']['prediction']) : $value['status']['prediction']) : "",
//                     'langcode' => 'en',
//             ]
            
//         );
//     }
//     }

//     return response()->json(['status'=>200,'message' => 'Weekly horoscope stored or already up to date','weekly'=>$existingHoroscope]);
// }

   
public function getYearlyHoroscope(Request $req)
{
    $currDate = date('d/m/Y');
    $year = date('Y');
    $zodiacId = $req->horoscopeSignId;
    $lang = 'en';

    set_time_limit(300);

    // Fetch API key
    $apiKey = DB::table('systemflag')->where('name', 'vedicAstroAPI')->value('value');

    // Get zodiac name
    $horoscopeSign = DB::table('hororscope_signs')->where('id', $zodiacId)->first();
    if (!$horoscopeSign) {
        return response()->json(['error' => 'Invalid horoscope sign ID'], 400);
    }

    // Define start and end of year
    $startOfYear = Carbon::createFromFormat('d/m/Y', "01/01/$year")->format('d/m/Y');
    $endOfYear = Carbon::createFromFormat('d/m/Y', "31/12/$year")->format('d/m/Y');

    // Check if horoscope already exists for this year
    $existingHoroscope = Horoscope::where('zodiac', $horoscopeSign->name)
        ->where('langcode', $lang)
        ->where('type', config('constants.YEARLY_HORSCOPE'))
        ->where('start_date', $startOfYear)
        ->where('end_date', $endOfYear)
        ->first();

    if (!$existingHoroscope || $existingHoroscope->date !== $currDate) {

        $response = Http::get('https://api.vedicastroapi.com/v3-json/prediction/yearly', [
            'zodiac' => $zodiacId,
            'date' => $currDate,
            'show_same' => true,
            'api_key' => $apiKey,
            'lang' => $lang,
            'year' => $year,
        ]);

        $data = $response->json();

        if (!isset($data['response']) || !is_array($data['response'])) {
            return response()->json(['error' => 'Invalid API response'], 500);
        }

        // Loop in case multiple zodiacs are returned
        foreach ($data['response'] as $value) {
            Horoscope::updateOrCreate(
                [
                    'zodiac' => $horoscopeSign->name,
                    'langcode' => $lang,
                    'type' => config('constants.YEARLY_HORSCOPE'),
                    'start_date' => $startOfYear,
                    'end_date' => $endOfYear,
                ],
                [
                    'total_score' => isset($value['score']) ? rtrim($value['score'], '%') : 0,
                    'lucky_color' => $value['lucky_color'] ?? '',
                    'lucky_color_code' => $value['lucky_color_code'] ?? '',
                    'lucky_number' => is_array($value['lucky_number'] ?? null) 
                        ? json_encode($value['lucky_number']) 
                        : ($value['lucky_number'] ?? '[]'),

                    'physique' => isset($value['physique']) ? json_encode($value['physique']) : '',
                    'status' => isset($value['status']) ? json_encode($value['status']) : '',
                    'finances' => isset($value['finances']) ? json_encode($value['finances']) : '',
                    'relationship' => isset($value['relationship']) ? json_encode($value['relationship']) : '',
                    'career' => isset($value['career']) ? json_encode($value['career']) : '',
                    'travel' => isset($value['travel']) ? json_encode($value['travel']) : '',
                    'family' => isset($value['family']) ? json_encode($value['family']) : '',
                    'friends' => isset($value['friends']) ? json_encode($value['friends']) : '',
                    'health' => isset($value['health']) ? json_encode($value['health']) : '',
                    'bot_response' => isset($value['prediction']) ? 
                        (is_array($value['prediction']) ? json_encode($value['prediction']) : str_replace("'", "", $value['prediction'])) : '',

                    'date' => $currDate,
                    'start_date' => $startOfYear,
                    'end_date' => $endOfYear,
                    'health_remark' => $value['health']['prediction'] ?? '',
                    'relationship_remark' => $value['relationship']['prediction'] ?? '',
                    'travel_remark' => $value['travel']['prediction'] ?? '',
                    'family_remark' => $value['family']['prediction'] ?? '',
                    'friends_remark' => $value['friends']['prediction'] ?? '',
                    'finances_remark' => $value['finances']['prediction'] ?? '',
                    'status_remark' => $value['status']['prediction'] ?? '',
                ]
            );
        }

        // Refresh from DB
        $existingHoroscope = Horoscope::where('zodiac', $horoscopeSign->name)
            ->where('langcode', $lang)
            ->where('type', config('constants.YEARLY_HORSCOPE'))
            ->where('start_date', $startOfYear)
            ->where('end_date', $endOfYear)
            ->first();
    }

    return response()->json([
        'status' => 200,
        'message' => 'Yearly horoscope stored or already up to date',
        'yearly' => $existingHoroscope
    ]);
}


    public function getHoroscope(Request $req)
    {
        try {

            $horoscope = DB::Table('horoscope')
                ->join('hororscope_signs', 'hororscope_signs.id', '=', 'horoscope.horoscopeSignId');
            if ($req->filterSign) {
                $horoscope = $horoscope->where('horoscope.horoscopeSignId', '=', $req->filterSign);
            } else {
                $horoscope = $horoscope->where("horoscopeSignId", '=', 1);
            }
            if ($req->horoscopeType) {
                error_log($req->horoscopeType);
                $horoscope = $horoscope->where('horoscope.horoscopeType', '=', $req->horoscopeType);
            } else {
                $horoscope = $horoscope->where('horoscope.horoscopeType', '=', 'Weekly');
            }
            error_log($req->filterSign);

            return response()->json([
                "message" => "Get Daily Horoscope Insight Successfully",
                'status' => 200,
                "recordList" => $horoscope->select('horoscope.*')->get(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500,
                'error' => false,
            ], 500);
        }
    }

    public function addHoroscopeFeedback(Request $req)
    {
        try {
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            } else {
                $id = Auth::guard('api')->user()->id;
            }
            $data = array(
                'userId' => $id,
                'feedback' => $req->feedback,
                'feedbacktype' => $req->feedbacktype,
            );
            DB::table('horoscopefeedback')->insert($data);
            return response()->json([
                "message" => "Add Feedback Successfully",
                'status' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500,
                'error' => false,
            ], 500);
        }
    }
}
