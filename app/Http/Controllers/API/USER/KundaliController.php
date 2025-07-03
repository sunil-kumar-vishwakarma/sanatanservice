<?php

namespace App\Http\Controllers\API\USER;

use App\Http\Controllers\Controller;
use App\Models\UserModel\Kundali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

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

        $data = $req->only('kundali', 'amount', 'is_match');

        // Validate the data
        $validator = Validator::make($data, [
            'kundali' => 'required|array',
            'amount' => 'required|numeric', // Assuming amount is required and should be numeric
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
                    $kundalis->pdf_link = isset($pdfUrl) ? $pdfUrl : '';
                    $kundalis->update();
                    $kundali2[] = $kundalis;
                }
            } else {
                // Check if wallet has enough amount only if is_match is false
				$kundalicount = Kundali::where('createdBy', '=', $id)->count();
                if (!$req->is_match && $kundalicount>0) {
                    $wallet = DB::table('user_wallets')
                        ->where('userId', '=', $id)
                        ->first();

                    $requiredAmount = $req->amount;

                    if ($wallet && $wallet->amount >= $requiredAmount) {
                        $updatedAmount = $wallet->amount - $requiredAmount;

                        DB::table('user_wallets')
                            ->where('userId', $id)
                            ->update(['amount' => $updatedAmount]);

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
                            'pdf_link' => isset($pdfUrl) ? $pdfUrl : '',

                        ]);

                        $kundali2[] = $newKundali;

                        // Add wallet transaction entry
                        $transaction = [
                            'userId' => $id,
                            'amount' => $requiredAmount,
                            'isCredit' => false,
                            'transactionType' => 'KundliView',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];

                        DB::table('wallettransaction')->insert($transaction);
                    } else {
                        // Insufficient funds in the wallet
                        return response()->json([
                            'error' => true,
                            'message' => 'Insufficient funds in the wallet.',
                            'status' => 400,
                        ], 400);
                    }
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
                            'pdf_link' => isset($pdfUrl) ? $pdfUrl : '',

                        ]);

                        $kundali2[] = $newKundali;
                    }else{
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
                        'pdf_link' => isset($kundaliList) ? $kundaliList : '',
                    ]);

                    $kundali2[] = $newKundali;
                    }
                    // If is_match is true, don't perform wallet-related actions

                }
            }
        }

        DB::commit();
        return response()->json([
            'message' => 'Kundali updated successfully',
            'recordList' => $kundali2,
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


// public function addKundali(Request $req)
// {
//     DB::beginTransaction();

//     try {
//         // Authenticate user
//         if (!Auth::guard('api')->user()) {
//             return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
//         } 
//         $id = Auth::guard('api')->user()->id;

//         // Validate request data
//         $data = $req->only('kundali', 'amount', 'is_match');
//         $validator = Validator::make($data, [
//             'kundali' => 'required|array',
//             'amount' => 'required|numeric',
//         ]);

//         if ($validator->fails()) {
//             return response()->json(['error' => $validator->messages(), 'status' => 400], 400);
//         }

//         $kundaliRecords = [];
//         $isMatch = $req->is_match == "false" ? 0 : 1;

//         foreach ($req->kundali as $kundali) {
//             if (isset($kundali['id'])) {
//                 // Update existing Kundali
//                 $existingKundali = Kundali::find($kundali['id']);

//                 if ($existingKundali) {
//                     $kundaliData = $this->fetchKundaliData($kundali);
//                     if (!$kundaliData) {
//                         return response()->json([
//                             'error' => true,
//                             'message' => 'Failed to fetch Kundali details. API issue.',
//                             'status' => 500,
//                         ], 500);
//                     }

//                     // Update data
//                     $existingKundali->update(array_merge($kundali, ['pdf_link' => $kundaliData]));
//                     $kundaliRecords[] = $existingKundali;
//                 }
//             } else {
//                 // New Kundali: Check wallet balance
//                 $kundaliCount = Kundali::where('createdBy', '=', $id)->count();
//                 $wallet = DB::table('user_wallets')->where('userId', '=', $id)->first();
//                 $requiredAmount = $req->amount;

//                 if (!$isMatch && $kundaliCount > 0 && (!$wallet || $wallet->amount < $requiredAmount)) {
//                     return response()->json([
//                         'error' => true,
//                         'message' => 'Insufficient funds in the wallet.',
//                         'status' => 400,
//                     ], 400);
//                 }

//                 // Deduct wallet amount if required
//                 if (!$isMatch && $kundaliCount > 0) {
//                     DB::table('user_wallets')->where('userId', $id)->update(['amount' => $wallet->amount - $requiredAmount]);
//                     DB::table('wallettransaction')->insert([
//                         'userId' => $id,
//                         'amount' => $requiredAmount,
//                         'isCredit' => false,
//                         'transactionType' => 'KundliView',
//                         'created_at' => now(),
//                         'updated_at' => now(),
//                     ]);
//                 }

//                 // Fetch Kundali details from API
//                 $kundaliData = $this->fetchKundaliData($kundali);
//                 if (!$kundaliData) {
//                     return response()->json([
//                         'error' => true,
//                         'message' => 'Failed to generate Kundali. API issue.',
//                         'status' => 500,
//                     ], 500);
//                 }

//                 // Create new Kundali entry
//                 $newKundali = Kundali::create(array_merge($kundali, [
//                     'createdBy' => $id,
//                     'modifiedBy' => $id,
//                     'pdf_link' => $kundaliData,
//                 ]));
                
//                 $kundaliRecords[] = $newKundali;
//             }
//         }

//         DB::commit();
//         return response()->json([
//             'message' => 'Kundali added successfully',
//             'recordList' => $kundaliRecords,
//             'status' => 200,
//         ], 200);
//     } catch (\Exception $e) {
//         DB::rollback();
//         return response()->json([
//             'error' => true,
//             'message' => $e->getMessage(),
//             'status' => 500,
//         ], 500);
//     }
// }

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

        // print_r($pdf_type);die;
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.vedicastroapi.com/v3-json/pdf/horoscope-queue?name='.$name.'&dob='.$birthDate.'&tob='.$birthTime.'&lat='.$latitude.'&lon='.$longitude.'&tz='.$timezone.'&api_key='.$api_key->value.'&lang=en&style=north&color=140&pob=indore&company_name=AstroWay&address=indore&website=https%3A%2F%2Fastroway.diploy.in%2F&email=nb%40diploy.in&phone=%2B91%208690482938&pdf_type='.$pdf_type.'',
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
    public function deleteKundali(Request $req)
    {
        try {
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            }
            $kundali = Kundali::find($req->id);
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
}
