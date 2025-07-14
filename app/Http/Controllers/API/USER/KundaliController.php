<?php

namespace App\Http\Controllers\API\USER;

use App\Http\Controllers\Controller;
use App\Models\UserModel\Kundali;
use App\Models\User;
use App\Models\ComputePersonalizeMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Str;
use Illuminate\Support\Facades\Storage;
use App\Models\PersonalizeDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
class KundaliController extends Controller
{

public function addKundali(Request $req)
{

    DB::beginTransaction();

    try {
        // Get user id
        if (!Auth::guard('api')->user()) {
            return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
        } else {
            $id = Auth::guard('api')->user()->id;
        }

        // $data = $req->only('kundali', 'amount', 'is_match');
        $data = $req->only('kundali', 'is_match');

        // Validate the data
        $validator = Validator::make($data, [
            'kundali' => 'required|array',
            // 'amount' => 'required|numeric', // Assuming amount is required and should be numeric
        ]);

        // Send a failed response if the request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages(), 'status' => 400], 400);
        }

        $kundali2 = [];

        if($req->is_match=="false"){
            $req->is_match=0;
        }

        // Create or update Kundali
        foreach ($req->kundali as $kundali) {

            if (isset($kundali['id'])) {
                $kundalis = Kundali::find($kundali['id']);

                if ($kundalis) {
                       $kundaliList = $this->getKundliViaVedic(
                        $kundali['name'],
                        $kundali['birthDate'],
                        $kundali['birthTime'],
                        $kundali['latitude'],
                        $kundali['longitude'],
                        $kundali['lang'],
                        $kundali['timezone'] ?? 5.5,
                        $kundali['birthPlace'],
                        $kundali['pdf_type']
                    );

                    $decoded = json_decode($kundaliList, true);
                    $pdfUrl = isset($decoded['response']) ? $decoded['response'] : null;
                    // $filename = 'horoscope'.time().'.pdf';
                    // $response = Http::get($pdfUrl);
                    // $pdfUrlss =   Storage::disk('public')->put('kundali_date/'.$filename, $response);
                    // $pdfUrlssPdf= 'storage/kundali_date/'.$filename;

                    // if ($pdfUrl) {
                        $filename = 'horoscope' . time() . '.pdf';
                        $response = Http::get($pdfUrl);

                        // Check if the HTTP request was successful
                        // if ($response->successful()) {
                            // Optional: check content-type is PDF
                            // if (strpos($response->header('Content-Type'), 'application/pdf') !== false) {
                                Storage::disk('public')->put('kundali_date/' . $filename, $response->body());
                                $pdfUrlssPdf = 'storage/kundali_date/' . $filename;
                    //         } else {
                    //             Log::error('Invalid content type from PDF URL: ' . $response->header('Content-Type'));
                    //         }
                    //     } else {
                    //         Log::error('Failed to download PDF. Status: ' . $response->status());
                    //     }
                    // }


                    $kundalis->name = $kundali['name'];
                    $kundalis->gender = $kundali['gender'];
                    $kundalis->birthDate = date('Y-m-d', strtotime($kundali['birthDate']));
                    $kundalis->birthTime = $kundali['birthTime'];
                    $kundalis->birthPlace = $kundali['birthPlace'];
                    $kundalis->latitude = $kundali['latitude'];
                    $kundalis->longitude = $kundali['longitude'];
                    $kundalis->timezone = isset($kundali['timezone']) ? $kundali['timezone'] : 5.5;
                    $kundalis->pdf_type = isset($kundali['pdf_type']) ? $kundali['pdf_type'] : '';
                    $kundalis->match_type = isset($kundali['match_type']) ? $kundali['match_type'] : '';
                    $kundalis->forMatch = isset($kundali['forMatch']) ? $kundali['forMatch'] : 0;
                    $kundalis->pdf_link = isset($pdfUrlssPdf) ? $pdfUrlssPdf : '';
                    $kundalis->update();
                    $kundali2[] = $kundalis;
                }
            } else {
                // Check if wallet has enough amount only if is_match is false
				$kundalicount = Kundali::where('createdBy', '=', $id)->count();
                if (!$req->is_match && $kundalicount>0) {
                    // $wallet = DB::table('user_wallets')
                    //     ->where('userId', '=', $id)
                    //     ->first();

                    // $requiredAmount = $req->amount;

                    // if ($wallet && $wallet->amount >= $requiredAmount) {
                    //     $updatedAmount = $wallet->amount - $requiredAmount;

                        // DB::table('user_wallets')
                        //     ->where('userId', $id)
                        //     ->update(['amount' => $updatedAmount]);

                        $kundaliList = $this->getKundliViaVedic(
                        $kundali['name'],
                        $kundali['birthDate'],
                        $kundali['birthTime'],
                        $kundali['latitude'],
                        $kundali['longitude'],
                        $kundali['lang'],
                        $kundali['timezone'] ?? 5.5,
                        $kundali['birthPlace'],
                        $kundali['pdf_type']
                    );
       
                $decoded = json_decode($kundaliList, true);
                $pdfUrl = isset($decoded['response']) ? $decoded['response'] : null;

                // $filename = 'horoscope'.time().'.pdf';
                // $response = Http::get($pdfUrl);
                // $pdfUrlss =   Storage::disk('public')->put('kundali_date/'.$filename, $response);
                // $pdfUrlssPdf= 'storage/kundali_date/'.$filename;

                                    
                    // if ($pdfUrl) {
                        $filename = 'horoscope' . time() . '.pdf';
                        $response = Http::get($pdfUrl);

                        // Check if the HTTP request was successful
                        // if ($response->successful()) {
                            // Optional: check content-type is PDF
                            // if (strpos($response->header('Content-Type'), 'application/pdf') !== false) {
                                Storage::disk('public')->put('kundali_date/' . $filename, $response->body());
                                $pdfUrlssPdf = 'storage/kundali_date/' . $filename;
                    //         } else {
                    //             Log::error('Invalid content type from PDF URL: ' . $response->header('Content-Type'));
                    //         }
                    //     } else {
                    //         Log::error('Failed to download PDF. Status: ' . $response->status());
                    //     }
                    // }

                        $newKundali = Kundali::create([
                            'name' => $kundali['name'],
                            'gender' => $kundali['gender'],
                            'birthDate' => date('Y-m-d', strtotime($kundali['birthDate'])),
                            'birthTime' => $kundali['birthTime'],
                            'birthPlace' => $kundali['birthPlace'],
                            'createdBy' => $id,
                            'modifiedBy' => $id,
                            'latitude' => $kundali['latitude'],
                            'longitude' => $kundali['longitude'],
                            'timezone' => isset($kundali['timezone']) ? $kundali['timezone'] : 5.5,
                            'pdf_type' => isset($kundali['pdf_type']) ? $kundali['pdf_type'] : '',
                            'match_type' => isset($kundali['match_type']) ? $kundali['match_type'] : '',
                            'forMatch' => isset($kundali['forMatch']) ? $kundali['forMatch'] : 0,
                            'pdf_link' => isset($pdfUrlssPdf) ? $pdfUrlssPdf : '',

                        ]);

                        $kundali2[] = $newKundali;

                        // Add wallet transaction entry
                        // $transaction = [
                        //     'userId' => $id,
                        //     'amount' => $requiredAmount,
                        //     'isCredit' => false,
                        //     'transactionType' => 'KundliView',
                        //     'created_at' => now(),
                        //     'updated_at' => now(),
                        // ];

                        // DB::table('wallettransaction')->insert($transaction);
                    // } else {
                        
                    //     return response()->json([
                    //         'error' => true,
                    //         'message' => 'Insufficient funds in the wallet.',
                    //         'status' => 400,
                    //     ], 400);
                    // }
                } else {
                    $kundalicount = Kundali::where('createdBy', '=', $id)->count();
                    if(!$req->is_match && $kundalicount==0){
                         $kundaliList = $this->getKundliViaVedic(
                        $kundali['name'],
                        $kundali['birthDate'],
                        $kundali['birthTime'],
                        $kundali['latitude'],
                        $kundali['longitude'],
                        $kundali['lang'],
                        $kundali['timezone'] ?? 5.5,
                        $kundali['birthPlace'],
                        $kundali['pdf_type']


                    );

                    $decoded = json_decode($kundaliList, true);
                    $pdfUrl = isset($decoded['response']) ? $decoded['response'] : null;
                    // $filename = 'horoscope'.time().'.pdf';
                    // $response = Http::get($pdfUrl);
                    // $pdfUrlss =   Storage::disk('public')->put('kundali_date/'.$filename, $response);
                    // $pdfUrlssPdf= 'storage/kundali_date/'.$filename;


                            
                    // if ($pdfUrl) {
                        $filename = 'horoscope' . time() . '.pdf';
                        $response = Http::get($pdfUrl);

                        // Check if the HTTP request was successful
                        // if ($response->successful()) {
                            // Optional: check content-type is PDF
                            // if (strpos($response->header('Content-Type'), 'application/pdf') !== false) {
                                Storage::disk('public')->put('kundali_date/' . $filename, $response->body());
                                $pdfUrlssPdf = 'storage/kundali_date/' . $filename;
                    //         } else {
                    //             Log::error('Invalid content type from PDF URL: ' . $response->header('Content-Type'));
                    //         }
                    //     } else {
                    //         Log::error('Failed to download PDF. Status: ' . $response->status());
                    //     }
                    // }

                        $newKundali = Kundali::create([
                            'name' => $kundali['name'],
                            'gender' => $kundali['gender'],
                            'birthDate' => date('Y-m-d', strtotime($kundali['birthDate'])),
                            'birthTime' => $kundali['birthTime'],
                            'birthPlace' => $kundali['birthPlace'],
                            'createdBy' => $id,
                            'modifiedBy' => $id,
                            'latitude' => $kundali['latitude'],
                            'longitude' => $kundali['longitude'],
                            'timezone' => isset($kundali['timezone']) ? $kundali['timezone'] : 5.5,
                            'pdf_type' => isset($kundali['pdf_type']) ? $kundali['pdf_type'] : '',
                            'match_type' => isset($kundali['match_type']) ? $kundali['match_type'] : '',
                            'forMatch' => isset($kundali['forMatch']) ? $kundali['forMatch'] : 0,
                            'pdf_link' => isset($pdfUrlssPdf) ? $pdfUrlssPdf : '',

                        ]);

                        $kundali2[] = $newKundali;
                    }else{
                        $kundaliList = $this->getKundliViaVedic(
                        $kundali['name'],
                        $kundali['birthDate'],
                        $kundali['birthTime'],
                        $kundali['latitude'],
                        $kundali['longitude'],
                        $kundali['lang'],
                        $kundali['timezone'] ?? 5.5,
                        $kundali['birthPlace'],
                        $kundali['pdf_type']


                    );

                    $decoded = json_decode($kundaliList, true);
                    $pdfUrl = isset($decoded['response']) ? $decoded['response'] : null;
                    // $filename = 'horoscope'.time().'.pdf';
                    // $response = Http::get($pdfUrl);
                    // $pdfUrlss =   Storage::disk('public')->put('kundali_date/'.$filename, $response);
                    // $pdfUrlssPdf= 'storage/kundali_date/'.$filename;


                            
                    if ($pdfUrl) {
                        $filename = 'horoscope' . time() . '.pdf';
                        $response = Http::get($pdfUrl);

                        // Check if the HTTP request was successful
                        // if ($response->successful()) {
                            // Optional: check content-type is PDF
                            // if (strpos($response->header('Content-Type'), 'application/pdf') !== false) {
                                Storage::disk('public')->put('kundali_date/' . $filename, $response->body());
                                $pdfUrlssPdf = 'storage/kundali_date/' . $filename;
                        //     } else {
                        //         Log::error('Invalid content type from PDF URL: ' . $response->header('Content-Type'));
                        //     }
                        // } else {
                        //     Log::error('Failed to download PDF. Status: ' . $response->status());
                        // }
                    }


                         $newKundali = Kundali::create([
                        'name' => $kundali['name'],
                        'gender' => $kundali['gender'],
                        'birthDate' => date('Y-m-d', strtotime($kundali['birthDate'])),
                        'birthTime' => $kundali['birthTime'],
                        'birthPlace' => $kundali['birthPlace'],
                        'createdBy' => $id,
                        'modifiedBy' => $id,
                        'latitude' => $kundali['latitude'],
                        'longitude' => $kundali['longitude'],
                        'timezone' => isset($kundali['timezone']) ? $kundali['timezone'] : 5.5,
                        'pdf_type' => isset($kundali['pdf_type']) ? $kundali['pdf_type'] : '',
                        'match_type' => isset($kundali['match_type']) ? $kundali['match_type'] : '',
                        'forMatch' => isset($kundali['forMatch']) ? $kundali['forMatch'] : 0,
                        'pdf_link' => isset($pdfUrlssPdf) ? $pdfUrlssPdf : '',
                    ]);

                    $kundali2[] = $newKundali;
                    }
                    // If is_match is true, don't perform wallet-related actions

                }
            }
        }

        DB::commit();
        return response()->json([
            'message' => 'Kundali Generated successfully',
            'recordList' => $kundali2,
            'recordListPDF' => $pdfUrl,
            'status' => 200,
        ], 200);
    } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
            'error' => false,
            'message' => $e->getMessage(),
            'status' => 500,
        ], 500);
    }
}


private function fetchKundaliData($kundali)
{
    try {
        return $this->getKundliViaVedic(
            $kundali['lang'],
            $kundali['name'],
            $kundali['latitude'],
            $kundali['longitude'],
            $kundali['birthDate'],
            $kundali['birthTime'],
            $kundali['timezone'] ?? 5.5,
            $kundali['birthPlace'],
            $kundali['pdf_type']
        );
    } catch (\Exception $e) {
        \Log::error('Kundali API call failed: ' . $e->getMessage());
        return null;
    }
}

 public function getPanchang(Request $req)
    {
        $api_key=DB::table('systemflag')->where('name','vedicAstroAPI')->first();

        // dd($api_key);

        try {
            $curl = curl_init();
            $date = date('d/m/Y',strtotime($req->panchangDate));
            $lat = $req->lat;
            $lon = $req->lon;
            $tz = $req->tz;
            $lang = $req->lang;
            // print_r($date);die;
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.vedicastroapi.com/v3-json/panchang/panchang?api_key='.$api_key->value.'&date='.$date.'&tz='.$tz.'&lat='.$lat.'&lon='.$lon.'&time=05%3A20&lang='.$lang.'',
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
            return response()->json([
                'recordList' => json_decode($response),
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

	public function getKundaliPrice(Request $req)
    {
        try {
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            } else {
                $id = Auth::guard('api')->user()->id;
            }
            $kundali = Kundali::where('createdBy', '=', $id)->count();
            return response()->json([
                'recordList' => config('constants.PDF_PRICE'),
                'isFreeSession' => $kundali > 0 ? false : true,
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

  public function getKundliViaVedic($name,$birthDate, $birthTime, $latitude,$longitude, $long, $timezone, $birthPlace,$pdf_type)
    {
 $api_key=DB::table('systemflag')->where('name','vedicAstroAPI')->first();

 
 $convertedName = str_replace(' ', '%2', $name);
//  $website = str_replace(' ', '%2', 'https://sanatanservice.com/public/');

//  print_r($website);die;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.vedicastroapi.com/v3-json/pdf/horoscope-queue?name='.$convertedName.'&dob='.$birthDate.'&tob='.$birthTime.'&lat='.$latitude.'&lon='.$longitude.'&tz='.$timezone.'&api_key='.$api_key->value.'&lang=en&style=north&color=140&pob=indore&company_name=SantanService%LLC&address=indore&website=https://sanatanservice.com/public/&email=sanatanservice@gmail.com&phone=%2B91%208690482938&pdf_type='.$pdf_type.'',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		));
		$response = curl_exec($curl);
		return $response;
    }

 
    //Get kundali
    public function getKundalis(Request $req)
    {
        try {
            // if (!Auth::guard('api')->user()) {
            //     return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            // } else {
            //     $id = Auth::guard('api')->user()->id;
            // }

            $user = Auth::guard('api')->user();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            }
    
            $id = $user->id;
            
            $kundali = Kundali::query();
            $kundali->where('createdBy', '=', $id)->where('forMatch',0)->orderByDesc('created_at');
            $kundaliCount = Kundali::query();
            $kundaliCount->where('createdBy', '=', $id)
                ->where('forMatch',0)->count();
            if ($s = $req->input(key:'s')) {
                $kundali->whereRaw(sql:"name LIKE '%" . $s . "%' ");
            }

            return response()->json([
                'recordList' => $kundali->get(),
                'status' => 200,
                'totalRecords' => $id,
				'kundliList' => json_decode('{"status":200,"response":"https://s3.ap-south-1.amazonaws.com/vapi.public.pdf/Tue%20Jan%2009%202024/hor_Karan%20Test-03011996-0904-1704796707150.pdf?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIAVSWEL6DIXT6LAQVK%2F20240109%2Fap-south-1%2Fs3%2Faws4_request&X-Amz-Date=20240109T103827Z&X-Amz-Expires=21600&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEFMaCmFwLXNvdXRoLTEiSDBGAiEAriZ4vzJ0CAA2H0N29ZMW1neGqFa1IdcDyOCHnPh5%2FE8CIQDJja9Kos0jIqMPoJs5WUmimBnymLdPx4zmpsjPp5BdSCr4Agjs%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F8BEAQaDDM4MzczNzY1NTUwNSIMWoYe92QqOOym96aCKswCGx7RjJjuAPolXNSBpB2XNNTFQESlMDoA7R4uQHhiLNMbk7BllB9j3Gz5ajQAPnIoiyyDEhaN9XFVLayAeU%2F8i%2Bk8LLrwwrv16NZ%2F4DR%2BTjkfrViKbKyNUXaJpRMT4t8iWP5%2FKEdkpVNfAjCoVvXFX3Nq1nE%2BBI2jf2AIPjgfXRjinYLuPVsErK2mMxk0V2C8wl5%2BPAkPlSsKuTbo1vvnGNd6Ny0mKsnA8U642CJUvaxKGIDSHAiNn7jYTcLsN9Un%2FOtQntNRNmGrRbEa3SJvVZLIgVqpTsOusvRLNIOCVpE5wQX3JpoOPWYr302nA%2FQ0zj4j9%2F4hmxzMJWDbZVlzNOIwxNdRlCbh%2FtcOAi9Sg00SPLxUFB1FzPz9hHphfVIoZwWy5vEJ1fVXx%2BpCwaCNom%2Bltyccr%2FL915Yrto8oHhoKl3YeFaqJNlvEWx0wiML0rAY6nQEB0myq%2B%2FG9KzhzoGh9t9NGpbr8bfzgcj273Ru6sn8CzATeYOIKSK8Lusd9KVv7s2VvwRMmlcenuRSOIJEMObOxPUqaO2hG9SjnpCbu8DMShd%2BUoHo505%2BEm9K520gEA5cvhVieGHwlFxk4BbSN4bh8A2b7F4j17G9Stp1q6XrMGmLcY3RVmMYdRfjQ2u%2BQu2hr%2FiSu9olOUXtLyDg0&X-Amz-Signature=d50e3e354b5c1cfab0953c1eaf088a750b804af4d03185e63060e9a169b6cddc&X-Amz-SignedHeaders=host"}'),//$kundaliList,
            ], 200);
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }


	// 	public function getKundali(Request $req, $id)
    // {
    //     try {
    //         $kundali = Kundali::where('id', $id)->first();
    //         $dob = date('d/m/Y', strtotime($kundali->birthDate));
    //         return response()->json([
    //             'message' => 'Kundali update sucessfully',
    //             'recordList' => json_decode('{"status":200,"response":"https://astroway.diploy.in/public/hor_Karan%20Test-03011996-0904-1704796707150.pdf"}'),
    //             'status' => 200,
    //         ], 200);
    //     } catch (\Exception$e) {
    //         return response()->json([
    //             'error' => false,
    //             'message' => $e->getMessage(),
    //             'status' => 500,
    //         ], 500);
    //     }
    // }

	//dynamic part

     

		public function getKundali(Request $req, $id)
    {
        try {
            $kundali = Kundali::where('id', $id)->first();
            $dob = date('d/m/Y', strtotime($kundali->birthDate));
            return response()->json([
                'message' => 'Kundali update sucessfully',
                'recordList' => ['status'=>200,'response'=>url('public/'.$kundali->pdf_link)],
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


 public function getKundalisList()
    {
        try {
         
            $user = Auth::guard('api')->user();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            }
    
            $id = $user->id;
            
            $kundali = Kundali::query();
            $kundali->where('createdBy', '=', $id)->whereNotNull('pdf_link')->where('forMatch',0)->orderByDesc('created_at');
            $kundaliCount = Kundali::query();
            $kundaliCount->where('createdBy', '=', $id)->whereNotNull('pdf_link')
                ->where('forMatch',0)->count();
           
            return response()->json([
                // 'recordList' => $kundali->get(),
                'status' => 200,
                'totalRecords' => $kundaliCount->count(),
                'kundliList' =>$kundali->get()
				
            ], 200);
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    //Update kundali
    public function updateKundali(Request $req, $id)
    {
        try {
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            }
            $req->validate = ([
                'name',
                'gender',
                'birthDate',
                'birthTime',
                'birthPlace',
            ]);

            $kundali = Kundali::find($id);
            if ($kundali) {
                $kundali->name = $req->name;
                $kundali->gender = $req->gender;
                $kundali->birthDate = $req->birthDate;
                $kundali->birthTime = $req->birthTime;
                $kundali->birthPlace = $req->birthPlace;
                $kundali->latitude = $req->latitude;
                $kundali->longitude = $req->longitude;
                $kundali->timezone = $req->timezone;
                $kundali->update();
                return response()->json([
                    'message' => 'Kundali update sucessfully',
                    'recordList' => $kundali,
                    'status' => 200,
                ], 200);
            }
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    //Delete kundali
    public function deleteKundali($id)
    {
        try {
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            }
            $kundali = Kundali::find($id);
            if ($kundali) {
                $kundali->delete();
                return response()->json([
                    'message' => 'Kundali delete Sucessfully',
                    'status' => 200,
                ], 200);
            }
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    //Show single kundali
    public function kundaliShow($id)
    {
        try {
            $kundali = Kundali::find($id);
            if ($kundali) {
                return response()->json([
                    'recordList' => $kundali,
                    'status' => 200,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Kundali is not found',
                    'status' => 404,
                ], 404);
            }
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }
    

    public function removeFromTrackPlanet(Request $req)
    {
        try {
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            } else {
                $id = Auth::guard('api')->user()->id;
            }
            $data = array(
                'isForTrackPlanet' => false,
            );
            DB::table('kundalis')->where('createdBy', '=', $id)->where('isForTrackPlanet', '=', true)->update($data);
            return response()->json([
                'message' => "Remove Kundali Successfully",
                'status' => 200,
                "id" => $id,
            ], 200);

        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    public function addForTrackPlanet(Request $req)
    {
        try {
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            }
            $data = array(
                'isForTrackPlanet' => true,
            );
            DB::table('kundalis')->where('id', '=', $req->id)->update($data);
            return response()->json([
                'message' => "Kundali Add Successfully",
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

    public function getForTrackPlanet(Request $req)
    {
        try {
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            } else {
                $id = Auth::guard('api')->user()->id;
            }
            $trackPlanetKundali = DB::table('kundalis')->where('createdBy', '=', $id)->where('isForTrackPlanet', '=', true)->get();

            return response()->json([
                'recordList' => $trackPlanetKundali,
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




// public function computePersonalizedMessage(Request $request)
// {
//     $request->validate([
//         'nakshatra_id' => 'required|integer',
//         'moon_sign' => 'required|string'
//     ]);

//     $nakshatraId = $request->nakshatra_id;
//     $moonSign = $request->moon_sign;

//     // $nakshatraPrediction = $this->getDailyNakshatraPredictions($nakshatraId);
//     $nakshatraPrediction = [
//         'prediction' => "Today is a powerful day for introspection and spiritual clarity. You may find comfort in solitude and wisdom in silence. Avoid overthinking—trust your instincts and remain grounded."
//     ];
//     $zodiacTraits = [
//         'traits' => "Adaptable, curious, intelligent, social, expressive, witty"
//     ];
//     // if (
//     //     !$nakshatraPrediction || !isset($nakshatraPrediction['prediction'])
//     // ) {
//     //     return response()->json(['message' => 'Personalized message is currently unavailable.'], 422);
//     // }

//             $prompt = <<<EOT
//         You are an expert Vedic astrologer. Based on the following:

//         1. Daily Nakshatra Prediction:
//         {$nakshatraPrediction['prediction']}

//         2. Zodiac Sign (Moon Sign): $moonSign
//         Traits: {$zodiacTraits['traits']}

//         Generate a personalized daily message (2–4 lines) for a user born under the $moonSign sign, considering both nakshatra and zodiac traits. Be friendly, insightful, and inspiring.
//         EOT;

//     // ✅ Use valid OpenAI key here
//     // $geminiKey = env('OPENAI_API_KEY'); // recommended to use env variable
//     $geminiKey = 'AIzaSyA8zxadwjuzmCzaRZdrW_eD9EEaqGNDFd4';
//     // $geminiKey = config('services.gemini.key'); // A safer way to get the key

//     $prompt = "Explain the difference between Laravel's HTTP Client and Guzzle in simple terms.";

//     try {
//         $response = Http::post([
//             'Content-Type' => 'application/json',
//         ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=$geminiKey", [
//             'contents' => [
//                 [
//                     'parts' => [
//                         ['text' => $prompt]
//                     ]
//                 ]
//             ]
//         ]);

//         // Throw an exception if the request was not successful (e.g., 4xx or 5xx error)
//         $response->throw();

//         // Get the generated text from the response body.
//         // You need to know the structure of the Gemini API response to do this.
//         $generatedText = $response->json('candidates.0.content.parts.0.text');

//         // Now you can use the text
//         echo $generatedText;

//     } catch (RequestException $e) {
//         // Handle API errors (e.g., invalid key, bad request, server error)
//         // You could log the error or return a user-friendly message
//         return "Error: Could not connect to the Gemini API. " . $e->getMessage();
//     }
// }


public function computePersonalizedMessage(Request $request)
{

            $user = Auth::guard('api')->user();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            }

            $userId = $user->id;
            $date = date('d/m/Y');

           
            
            // print_r($promptMessage);die;

    $request->validate([
        'nakshatra_id' => 'required',
        'moon_sign' => 'required|string',
        'dob' => 'required|string',
        'tob' => 'required|string',
        'pob' => 'required|string'

    ]);
    $date = date('Y-m-d');
    $nakshatraId = $request->nakshatra_id;
    $moonSign = $request->moon_sign;
    $dob = $request->dob;
    $tob = $request->tob;
    $pob = $request->pob;

$birthDate = Carbon::createFromFormat('d/m/Y', $request->dob)->format('Y-m-d');

    $prompt = 
    <<<EOT
    You are a knowledgeable Vedic astrologer. Based on the data below, write a personalized daily summary in a warm and concise tone:

- Nakshatra ID: $nakshatraId
- Moon Sign: $moonSign
- Date:$date
- User DOB: $dob
- Time of Birth: $tob
- Place of Birth: $pob

Generate a short and  insightful astrology summary for the user exactly including the following sections, each as a label and value pair that can be shown in a text format in an app, do not remove any section in summary:
    this is parameter

1. Todays Insight (no user greeting or placeholder in response)
2. Shubh Muhurat (time range in AM or PM and purpose)
3. Rahu Kaal (time range in AM or PM and purpose)
4. Ritual Suggestion
Show message response in text format view where Todays insight is 500 character in user friendly text and total response is 900 characters.
EOT;

//     $prompt = <<<EOT
// You are an expert Sanatan title and web content generator. Based on the following:

// - Nakshatra ID: $nakshatraId
// - Moon Sign: $moonSign
// - Date: $date
// - User DOB: $dob
// - Time of Birth: $tob
// - Place of Birth: $pob

// Generate a **short and Sanatan insightful astrology summary** for the user including the following sections, each as a **label and value pair** that can be shown in a text format:
//     this is parameter
// 0. Sanatan insightful astrology summary
// 1. Today's Insight
// 2. Rahu Kaal (time range and purpose)
// 3. Shubh Muhurat (time range and purpose)
// 4. Ritual Suggestion
// Show message response in text format view 150 character
// .
// EOT;


    // Replace this with your actual Gemini API Key securely from env
    $geminiKey = 'AIzaSyA8zxadwjuzmCzaRZdrW_eD9EEaqGNDFd4';

    try {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$geminiKey", [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ]
        ]);

        $response->throw(); // if 4xx/5xx error, it will throw

        $generatedText = $response->json('candidates.0.content.parts.0.text');
        $cleanHtml = Str::of($generatedText)
            ->replace('```html', '')
            ->replace('```', '')
            ->trim();

             $promptMessage = ComputePersonalizeMessage::where('user_id', $userId)->first();
            if(!empty($promptMessage)){
               $prodate = $promptMessage->date;

               $dob = $request->dob;
               $tob = $request->tob;
               $pob = $request->pob;

               if($dob !=$promptMessage->dob || $tob !=$promptMessage->tob || $pob !=$promptMessage->pob){

                $promptMessage = ComputePersonalizeMessage::where('user_id', $userId)->update(['message' => $cleanHtml,'date' => $date, 'dob'=>$dob,'tob'=>$tob,'pob'=>$pob]);
           
               } else 

            //    if($dob ==$promptMessage->dob || $tob ==$promptMessage->tob || $pob ==$promptMessage->pob || $prodate !=$date){
            //          $promptMessage = ComputePersonalizeMessage::where('user_id', $userId)->update(['message' => $cleanHtml,'date' => $date, 'dob'=>$dob,'tob'=>$tob,'pob'=>$tob]);
           
            //     }

                if($prodate !=$date){
                     $promptMessage = ComputePersonalizeMessage::where('user_id', $userId)->update(['message' => $cleanHtml,'date' => $date]);
           
                }

            }else{

           
            $promptMessage = ComputePersonalizeMessage::create(['user_id' => $userId,'message' => $cleanHtml,'date' => $date,'dob'=>$dob,'tob'=>$tob,'pob'=>$tob]);
            // print_r($promptMessage);die;
             }

             $promptMessages = ComputePersonalizeMessage::where('user_id', $userId)->first();
           $promptDatamessage=  $promptMessages['message'];
        return response()->json([
                        'status' => 200,
                        "message" => "Successfully",
                        'html' => $promptDatamessage
                    ], 200);

    } catch (\Illuminate\Http\Client\RequestException $e) {
        return response()->json([
            'error' => 'Could not connect to Gemini API.',
            'details' => $e->response ? $e->response->json() : $e->getMessage()
        ], 500);
    }
}


    public function UserPersonalizeDetails(Request $request)
    {
        try {
            // Check if user is authenticated
            $user = Auth::guard('api')->user();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            }

            $id = $user->id;
    
        $validator = Validator::make($request->all(), [
            // 'zodiac_sign' => 'required|string',
            'date_of_birth' => 'required|date',
            'time_of_birth' => 'required',
            'place_of_birth' => 'required|string',
            'current_location' => 'required|string',
            'lat' => 'required',
            'lon' => 'required',
            'tz' => 'required',
            
        ]);
            if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $dob = $request->date_of_birth;
        $tob = $request->time_of_birth;
        $lat = $request->lat;
        $lon= $request->lon;
        $tz= $request->tz;
            // $validator['user_id'] = $id;
            $zodiacSign =  $this->findZodiacSign($dob, $tob,$lat,$lon,$tz);
            $decoded = json_decode($zodiacSign, true);
            $zo = isset($decoded['response']) ? $decoded['response'] : null;

            $getNakshatraKundliDetail =  $this->getNakshatraKundliDetail($dob,$tob,$lat,$lon,$tz);
           
            $nakshatraId = $getNakshatraKundliDetail['response']['nakshatra'];
           
            $request['zodiac_sign'] = $zo['moon_sign'];
            $request['nakshatraId'] = $getNakshatraKundliDetail['response']['nakshatra'];
            $detail = PersonalizeDetail::updateOrCreate(['user_id' => $id],$request->all());
            $birthDate = Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('Y-m-d');
            $birthTime = $request->time_of_birth . ':00';

            User::where('id', $id)->update([
                'birthDate' => $birthDate,
                'birthTime' => $birthTime,
                'birthPlace' => $request->place_of_birth,
            ]);
            return response()->json([
                'status' => 200,
                "message" => "Add Personalize details successfully",
                "details" => $detail
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

   public function personalizeDetailShow()
    {
        try {
            $user = Auth::guard('api')->user();

            if (!$user) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            }

            // Try to get personalize detail, but don't fail if missing
            $detail = PersonalizeDetail::where('user_id', $user->id)->first();

        

            return response()->json([
                'status' => 200,
                'message' => 'Get personalize details successfully',
                'personalize_details' => $detail ?? '',
                'user'=>$user
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    public function findZodiacSign($dob, $tob, $lat, $lon, $tz)
    {
        

        $lang = 'en';
        // print_r($tob);die;

        $apiKey = '445a4fd8-0e58-5ea9-89b2-0cff19374be1';
        $url = 'https://api.vedicastroapi.com/v3-json/extended-horoscope/find-moon-sign';

        $params = [
            'api_key' => $apiKey,
            'dob' => $dob,
            'tob' => $tob,
            'lat' => $lat,
            'lon' => $lon,
            'tz' => $tz,
            'lang' => $lang,
        ];

        $finalUrl = $url . '?' . http_build_query($params);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $finalUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 20,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
        // $result = json_decode($response, true);
        // if (json_last_error() === JSON_ERROR_NONE) {
        //     return $result;
        // }

        // return ['status' => 500, 'response' => 'Invalid JSON from API'];
    }

    public function getZodiacSign(Request $request)
    {
         $request->validate([
        'dob' => 'required',
        'tob' => 'required',
        'lat' => 'required',
        'lon' => 'required',
        'tz' => 'required',
        'lang' => 'required',
        ]);
    
        $dob = $request->dob;
        $tob =$request->tob;
        $lat =$request->lat;
        $lon= $request->lon;
        $tz= $request->tz;
        $lang = $request->lang;
    

        $apiKey = '445a4fd8-0e58-5ea9-89b2-0cff19374be1';
        $url = 'https://api.vedicastroapi.com/v3-json/extended-horoscope/find-moon-sign';

        $params = [
            'api_key' => $apiKey,
            'dob' => $dob,
            'tob' => $tob,
            'lat' => $lat,
            'lon' => $lon,
            'tz' => $tz,
            'lang' => $lang,
        ];

        $finalUrl = $url . '?' . http_build_query($params);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $finalUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 20,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($response, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $result;
        }

        return ['status' => 500, 'response' => 'Invalid JSON from API'];
    }

//     public function getZodiacTraits($sign)
// {
//     $traits = [
//         'Gemini' => 'Intelligent, curious, adaptable, witty, talkative, but sometimes restless.',
//         'Taurus' => 'Grounded, dependable, sensual, stubborn, values stability.',
//         'Leo' => 'Confident, warm, charismatic, loves attention and creativity.',
//         // Add more signs here
//     ];

//     return isset($traits[$sign]) ? ['traits' => $traits[$sign]] : null;
// }

public function getDailyNakshatraPrediction(Request $request)
{
      $request->validate([
        'nakshatraId' => 'required',
        // 'date' => 'required',
        // 'lang' => 'required',
        
    ]);

    $nakshatraId = $request->nakshatraId;
    $date = $request->date;
    $lang = 'en';
    $apiKey = '445a4fd8-0e58-5ea9-89b2-0cff19374be1';
    $date = $date ?? date('d/m/Y'); // default today

    $url = 'https://api.vedicastroapi.com/v3-json/prediction/daily-nakshatra';

    $params = [
        'nakshatra' => $nakshatraId,
        'date' => $date,
        'api_key' => $apiKey,
        'lang' => $lang
    ];

    $finalUrl = $url . '?' . http_build_query($params);

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $finalUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 15,
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response, true);
}
public function getDailyNakshatraPredictions($nakshatraId)
{
    $apiKey = '445a4fd8-0e58-5ea9-89b2-0cff19374be1';
    $date = date('d/m/Y');

    $url = 'https://api.vedicastroapi.com/v3-json/prediction/daily-nakshatra';

    $params = [
        'nakshatra' => $nakshatraId,
        'date' => $date,
        'api_key' => $apiKey,
        'lang' => 'en'
    ];

    $finalUrl = $url . '?' . http_build_query($params);

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $finalUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 15,
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response, true);
}


public function getNakshatraKundliDetail($dob,$tob,$lat,$lon,$tz)
{
    //  $request->validate([
    //         'dob' => 'required|date_format:d/m/Y',
    //         'tob' => 'required',
    //         'lat' => 'required',
    //         'lon' => 'required',
    //         'tz'  => 'required',
    //         'lang'  => 'required',
    //     ]);

    //  $dob = $request->dob;
    // $tob = $request->tob;
    // $lat = $request->lat;
    //  $lon = $request->lon;
    // $tz = $request->tz;
    // $lang = $request->lang;

    $apiKey = '445a4fd8-0e58-5ea9-89b2-0cff19374be1';
    $url = 'https://api.vedicastroapi.com/v3-json/extended-horoscope/extended-kundli-details';

    $params = [
        'api_key' => $apiKey,
        'dob' => $dob,
        'tob' => $tob,
        'lat' => $lat,
        'lon' => $lon,
        'tz' => $tz,
        'lang' => 'en'
    ];

    $finalUrl = $url . '?' . http_build_query($params);

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $finalUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 20,
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    // $data = json_decode($response, true);
    

    return json_decode($response, true);

    if (isset($data['nakshatra']['id'])) {
        return [
            'id' => $data['nakshatra']['id'],
            'name' => $data['nakshatra']['name_en'] ?? $data['nakshatra']['name']
        ];
    }

    return null;
}


public function getNakshatraFromKundli(Request $request)
{
     $request->validate([
            'dob' => 'required|date_format:d/m/Y',
            'tob' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'tz'  => 'required',
            'lang'  => 'required',
        ]);

     $dob = $request->dob;
    $tob = $request->tob;
    $lat = $request->lat;
     $lon = $request->lon;
    $tz = $request->tz;
    $lang = $request->lang;

    $apiKey = '445a4fd8-0e58-5ea9-89b2-0cff19374be1';
    $url = 'https://api.vedicastroapi.com/v3-json/extended-horoscope/extended-kundli-details';

    $params = [
        'api_key' => $apiKey,
        'dob' => $dob,
        'tob' => $tob,
        'lat' => $lat,
        'lon' => $lon,
        'tz' => $tz,
        'lang' => $lang
    ];

    $finalUrl = $url . '?' . http_build_query($params);

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $finalUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 20,
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    // $data = json_decode($response, true);
    

    return json_decode($response, true);

    if (isset($data['nakshatra']['id'])) {
        return [
            'id' => $data['nakshatra']['id'],
            'name' => $data['nakshatra']['name_en'] ?? $data['nakshatra']['name']
        ];
    }

    return null;
}


public function getAscendant(Request $request)
    {
        // Validate incoming request (optional)
        $request->validate([
            'dob' => 'required|date_format:d/m/Y',
            'tob' => 'required',
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
            'tz'  => 'required|numeric',
        ]);

        // Get request inputs or use defaults
        $dob = $request->dob;
        $tob = $request->tob;
        $lat = $request->lat;
        $lon = $request->lon;
        $tz  = $request->tz;
        $lang = $request->lang;

        $apiKey = '445a4fd8-0e58-5ea9-89b2-0cff19374be1';

        $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/find-ascendant";

        $response = Http::get($url, [
            'api_key' => $apiKey,
            'dob' => $dob,
            'tob' => $tob,
            'lat' => $lat,
            'lon' => $lon,
            'tz' => $tz,
            'lang' => $lang
        ]);

        if ($response->successful()) {
            return response()->json([
                'status' => true,
                'data' => $response->json()
            ]);
        } else {
            return response()->json([
                'status' => false,
                'error' => 'Failed to fetch data from API',
                'details' => $response->body()
            ], $response->status());
        }
    }


}
