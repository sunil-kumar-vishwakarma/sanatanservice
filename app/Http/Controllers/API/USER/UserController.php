<?php

namespace App\Http\Controllers\API\USER;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\DefaultProfile;
use App\Models\UserModel\User;
use App\Models\UserModel\UserDeviceDetail;
use App\Models\UserModel\UserRole;
use App\Models\UserModel\UserWallet;
use App\Models\PersonalizeDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

define('DESTINATIONPATH', 'public/storage/images/');

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(
            'auth:api',
            [
                'except' => [
                    'loginUser',
                    'addUser',
                    'getUsers',
                    'profile',
                    'updateUser',
                    'refreshToken',
                    'forgotPassword',
                    'loginAppUser',
                    'verifyOTP',
                    'signUp',
                    'resetPassword',
                    'verifyEmailOtp',
                    'resentOtpUser',
                    
                ],
            ]
        );
    }



    //Add User
    public function addUser(Request $req)
    {
        try {
            DB::beginTransaction();

            $data = $req->only(
                'name',
                'contactNo',
                'email',
                'password',
                'birthDate',
                'birthTime',
                'profile',
                'birthPlace',
                'addressLine1',
                'location',
                'pincode',
                'gender',
                'countryCode'
            );

            //Validate the data
            // $validator = Validator::make($data, [
            //     'contactNo' => 'required|max:10|unique:users,contactNo',
            // ]);

                $rules = [];

                if ($req->has('contactNo')) {
                    $rules['contactNo'] = 'required|digits:10|unique:users,contactNo';
                }

                if ($req->has('email')) {
                    $rules['email'] = 'required|email|unique:users,email';
                }

                $validator = Validator::make($req->all(), $rules);


            //Send failed response if request is not valid
            if ($validator->fails()) {
                DB::rollback();
                return response()->json(['error' => $validator->messages(), 'status' => 400], 400);
            }

            //Image
            
            //Create a new user
            $user = User::create([
                'name' => $req->name,
                'contactNo' => $req->contactNo,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'birthDate' => $req->birthDate,
                'birthTime' => $req->birthTime,
                'birthPlace' => $req->birthPlace,
                'addressLine1' => $req->addressLine1,
                'location' => $req->location,
                'pincode' => $req->pincode,
                'gender' => $req->gender,
                'countryCode' => $req->countryCode,
               
            ]);

            

        // Store OTP in password_resets table
        // DB::table('password_resets')->updateOrInsert(
        //     ['email' => $request->email],
        //     ['token' => $otp, 'created_at' => Carbon::now()]
        // );

        // Send OTP via email
        

            // if ($req->profile) {
            //     if (Str::contains($req->profile, 'storage')) {
            //         $path = $req->profile;
            //     } else {
            //         $time = Carbon::now()->timestamp;
            //         $imageName = 'profile_' . $user->id;
            //         $path = DESTINATIONPATH . $imageName . $time . '.png';
            //         File::delete($path);
            //         file_put_contents($path, base64_decode($req->profile));
            //     }
            // } else {
            //     $path = null;
            // }
            // $user->profile = $path;
            $user->update();
            UserRole::create([
                'userId' => $user->id,
                'roleId' => 3,
            ]);

            //Create token
            $id = ['id' => $user->id];
            DB::commit();
            //Json response
            return response()->json([
                'success' => true,
                'token_type' => 'Bearer',
                'status' => 200,
                'message' => 'User add sucessfully',
                'recordList' => $user,
            ], 200);
        } catch (\Exception$e) {
            DB::rollback();
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }


   public function resentOtpUser(Request $req)
{
 
        // ✅ Validate that email exists (not unique, since it's resend OTP)
        $validator = Validator::make($req->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            DB::rollBack();
            return response()->json([
                'error' => $validator->messages(),
                'status' => 400
            ], 400);
        }

        // ✅ Find the existing user
        $user = User::where('email', $req->email)->first();

        if (!$user) {
            DB::rollBack();
            return response()->json([
                'error' => 'User not found',
                'status' => 404
            ], 404);
        }

        // ✅ Generate new OTP
        $otp = rand(100000, 999999);

        // ✅ Update OTP for the user
        $user->update([
            'otp' => $otp,
        ]);

        Mail::raw("Your OTP is: $otp", function ($message) use ($req) {
            $message->to($req->email)
                    ->subject('Verify email OTP');
        });
        // ✅ Send OTP via email
        // Mail::raw("Your OTP is: $otp", function ($message) use ($req) {
        //     $message->to($req->email)
        //         ->subject('Verify email OTP');
        // });

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'OTP resent successfully',
            'recordList' => $user,
        ], 200);

    
}


    public function verifyEmailOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp'   => 'required|numeric|digits:6', // ✅ exactly 6 digits
        ]);

        $user = User::where('email', $request->email)
                    ->where('otp', $request->otp)
                    ->first();

                    // print_r($user);die;
        if (!$user) {
            return response()->json(['error' => 'Invalid OTP'], 400);
        }

        // ✅ Update email_verified_at with current date & time
        $user->update([
            'email_verified_at' => now(),
            'otp' => null // optional: clear OTP after success
        ]);

        return response()->json([
            'email'   => $user->email,
            'message' => 'OTP verified successfully',
            'verified_at' => $user->email_verified_at
        ], 200);
    }


    public function googleLogin(Request $request)
    {
        $validated = $request->validate([
            'uid' => 'required|string',
            'email' => 'required|email',
            'name' => 'required|string',
            'photo_url' => 'nullable|string',
        ]);

        // Check if user already exists
        $user = User::where('google_uid', $validated['uid'])
                    ->orWhere('email', $validated['email'])
                    ->first();

        if (!$user) {
            // Create new user
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'google_uid' => $validated['uid'],
                'profile' => $validated['photo_url'] ?? null,
                'password' => bcrypt(str()->random(16)), // random password
            ]);
        } else {
            // Update photo/name if changed
            $user->update([
                'google_uid' => $validated['uid'],
                'name' => $validated['name'],
                'profile' => $validated['photo_url'] ?? $user->photo_url,
            ]);
        }

        // Generate token
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token,
        ]);
    }
    
    public function signUp(Request $request)
    {
        // print_r($request->all());die;
        try {
            $data = $request->only(
                'name',
                'email',
                'password',
                'password_confirmation',
            );

            //Validate the data
            $validator = Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed', // `confirmed` checks for `password_confirmation`

            ]);

            //Send failed response if request is not valid
            if ($validator->fails()) {
                DB::rollback();
                return response()->json(['error' => $validator->messages(), 'status' => 400], 400);
            }

            //Image

            $otp = rand(100000, 999999);

            //Create a new user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'otp' => $otp,
            ]);
            
             
        Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Verify email OTP');
        });

            $user->update();
            UserRole::create([
                'userId' => $user->id,
                'roleId' => 3,
            ]);

            //Create token
            $id = ['id' => $user->id];
            DB::commit();
            //Json response
            return response()->json([
                'success' => true,
                'token_type' => 'Bearer',
                'status' => 200,
                'message' => 'User add sucessfully',
                'recordList' => $user,
            ], 200);
        } catch (\Exception$e) {
            DB::rollback();
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }
    //Get user details
    public function getUsers(Request $req)
    {
        try {

            $user = DB::table('users')
                ->join('user_roles', 'user_roles.userId', '=', 'users.id')
                ->where('users.isActive', '=', true)
                ->where('users.isDelete', '=', false)
                ->where('user_roles.roleId', '=', 3)
                ->select('users.*', 'user_roles.roleId')
                ->orderBy('users.id', 'DESC')
            ;
            error_log($req->searchString);
            if ($req->searchString) {
                $user->whereRaw(sql:"users.name LIKE '%" . $req->searchString . "%' ");
            }

            if ($req->startIndex >= 0 && $req->fetchRecord) {
                $user->skip($req->startIndex);
                $user->limit($req->fetchRecord);
            }
            $userCount = DB::table('users')
                ->join('user_roles', 'user_roles.userId', '=', 'users.id')
                ->where('users.isActive', '=', true)
                ->where('users.isDelete', '=', false)
                ->where('user_roles.roleId', '=', 3)

            ;
            if ($req->searchString) {
                $userCount->whereRaw(sql:"users.name LIKE '%" . $req->searchString . "%' ");
            }
            return response()->json([
                'recordList' => $user->get(),
                'status' => 200,
                'totalRecords' => $userCount->count(),
            ], 200);
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    //Update user
    public function updateUser(Request $req)
    {
      
        try {

            $req->validate = ([
                'contactNo' => 'required',
                'birthDate' => 'required',
                'birthTime' => 'required',
                'lat' => 'required',
                'lon' => 'required',
                'tz' => 'required',
                'birthPlace' => 'required',
            ]);
            $user = Auth::guard('api')->user();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            }
    
            $id = $user->id;

            
            // $user = User::find($id);
            if ($user) {
                $time = Carbon::now()->timestamp;
            
                // For Web view
              


                //
                $path = null;
        
                if ($req->hasFile('profile')) {
                    // Delete old thumbnail
                    if ($user->profile) {
                        Storage::disk('public')->delete($user->profile);
                    }
                    $thumbnailPath = $req->file('profile')->store('thumbnails', 'public');
                    $user->profile = $thumbnailPath;
                }
       

                // $birthDate = Carbon::createFromFormat('Y-m-d', $req->date_of_birth)->format('d/m/Y');
                $user->name = $req->name;
                $user->contactNo = $req->contactNo;
                // $user->password = Hash::make($req->password);
                // $user->birthDate = $req->birthDate;
                $user->birthDate = $req->birthDate;
                $user->birthTime = $req->birthTime;
                $user->birthPlace = $req->birthPlace;
                $user->addressLine1 = $req->addressLine1;
                $user->location = $req->location;
                // $user->profile = $path;
                $user->pincode = $req->pincode;
                $user->gender = $req->gender;
                // $user->email = $req->email;
                $user->countryCode = $req->countryCode;
                $user->update();

                $dateString = $req->birthDate; // e.g., '02/05/1996'
                $carbonDate = Carbon::createFromFormat('Y-m-d', $dateString); // ✔️
                $birthDate = $carbonDate->format('d/m/Y');
                $dob = $birthDate;
                $tob = $req->birthTime;
                $lat = $req->lat;
                $lon= $req->lon;
                $tz= $req->tz;
                $birthPlace= $req->birthPlace;
            
                $zodiacSign =  $this->findZodiacSign($dob, $tob,$lat,$lon,$tz);
                $decoded = json_decode($zodiacSign, true);
                $zo = isset($decoded['response']) ? $decoded['response'] : null;

                $zodiacSunSign =$this->findZodiacSunSign($dob, $tob,$lat,$lon,$tz);
                $decodedSun = json_decode($zodiacSunSign, true);
                $sunsign = isset($decodedSun['response']) ? $decodedSun['response'] : null;


                $getNakshatraKundliDetail =  $this->getNakshatraKundliDetail($dob,$tob,$lat,$lon,$tz);
                if (
                is_array($getNakshatraKundliDetail) &&
                isset($getNakshatraKundliDetail['status']) &&
                $getNakshatraKundliDetail['status'] == 200 &&
                isset($getNakshatraKundliDetail['response']) &&
                is_array($getNakshatraKundliDetail['response']) &&
                isset($getNakshatraKundliDetail['response']['nakshatra'])
            ) {
                $nakshatraId = $getNakshatraKundliDetail['response']['nakshatra'];
            } else {
                // Handle the error properly
                return response()->json([
                    'error' => 'API Error',
                    'message' => $getNakshatraKundliDetail['response'] ?? 'Unknown error',
                    'status' => $getNakshatraKundliDetail['status'] ?? 500
                ], $getNakshatraKundliDetail['status'] ?? 500);
            }
            
                $nakshatraId = $getNakshatraKundliDetail['response']['nakshatra'];
            
                $req['zodiac_sign'] = $zo['moon_sign'];
                $req['zodiac_sun_sign'] = $sunsign['sun_sign'];
                $req['nakshatraId'] = $getNakshatraKundliDetail['response']['nakshatra'];
                $req['date_of_birth'] = $birthDate;
                $req['lat'] = $lat;
                $req['lon'] = $lon;
                $req['tz'] = $tz;
                $req['time_of_birth'] = $tob;
                $req['place_of_birth'] = $birthPlace;
                $birthTime = $req->time_of_birth . ':00';
                $detail = PersonalizeDetail::updateOrCreate(['user_id' => $id],$req->all());
                $user['nakshatraId'] =$detail->nakshatraId;
                $user['zodiac_sign'] =$detail->zodiac_sign;
                $user['zodiac_sun_sign'] =$detail->zodiac_sun_sign;
                $user['current_location'] =$detail->current_location;
                $user['lat'] =$detail->lat;
                $user['lon'] =$detail->lon;
                $user['tz'] =$detail->tz;
               

                return response()->json(['message' => 'User update sucessfully', 'status' => 200, 'data'=>$user], 200);
            } else {
                return response()->json(['message' => 'No user is found', 'status' => 404], 404);
            }
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    public function getNakshatraKundliDetail($dob,$tob,$lat,$lon,$tz)
{
   
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

    return json_decode($response, true);

    if (isset($data['nakshatra']['id'])) {
        return [
            'id' => $data['nakshatra']['id'],
            'name' => $data['nakshatra']['name_en'] ?? $data['nakshatra']['name']
        ];
    }

    return null;
}

     public function findZodiacSign($dob, $tob, $lat, $lon, $tz)
    {
        

        $lang = 'en';
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
    
    }

      public function findZodiacSunSign($dob, $tob, $lat, $lon, $tz)
    {
        

        $lang = 'en';
        // print_r($tob);die;

        $apiKey = '445a4fd8-0e58-5ea9-89b2-0cff19374be1';
        $url = 'https://api.vedicastroapi.com/v3-json/extended-horoscope/find-sun-sign';

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
    //Login admin
    // public function loginUser(Request $req)
    // {

    //     try {
    //         $data = $req->only('email', 'password');
    //         // print_r($data);die;
    //         //Valid credential
    //         $validator = Validator::make($data, [
    //             'email' => 'required',
    //             'password' => 'required|string|min:6|max:50',
    //         ]);

    //         //Send failed response if request is not valid
    //         if ($validator->fails()) {
    //             return response()->json(['error' => $validator->errors(), 'status' => 400], 400);
    //         }

    //         //Create token
    //         try {
    //             $token = Auth::guard('api')->attempt($data);
    //             // print_r($token);die;

    //             if (!$token ) {

    //                 // print_r($token);die;

    //                 return response()->json([
    //                     'success' => false,
    //                     'message' => 'Login credentials are invalid.',
    //                 ], 400);
    //             }
    //         } catch (JWTException $e) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Could not create token.',
    //             ], 500);
    //         }
    //         if ($token) {
    //             $data = array(
    //                 'token' => $token,
    //                 'expirationDate' => Carbon::now()->addMonth(),
    //             );
    //             DB::table('users')->where('email', '=', $req->email)->update($data);
    //         }
    //         //Json response
    //         return response()->json([
    //             'success' => true,
    //             'token' => $token,
    //             'token_type' => 'Bearer',
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
public function loginUser(Request $req)
{
    try {
        $data = $req->only('email', 'password');

        // ✅ Validation
        $validator = Validator::make($data, [
            'email'    => 'required|email',
            'password' => 'required|string|min:6|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 400], 400);
        }

        // ✅ Check if user exists & email verified
        $user =User::where('email', $req->email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.',
            ], 404);
        }

        if (is_null($user->email_verified_at)) {
            return response()->json([
                'success' => false,
                'message' => 'Please verify your email before login.',
            ], 403);
        }

        // ✅ Create token
        try {
            $token = Auth::guard('api')->attempt($data);

            if (!$token) {
                return response()->json([
                    'success' => false,
                    'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Could not create token.',
            ], 500);
        }

        // ✅ Update last login & token expiry in DB
        $user->update([
            'last_login_at'  => now(),
            'token'          => $token,
            'expirationDate' => Carbon::now()->addMonth(),
        ]);

        return response()->json([
            'success'     => true,
            'token'       => $token,
            'token_type'  => 'Bearer',
            'status'      => 200,
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
            'status'  => 500,
        ], 500);
    }
}


//     public function loginUser(Request $req)
// {
//     try {
//         // Validate request
//         $validator = Validator::make($req->all(), [
//             'email' => 'required|email',
//             'password' => 'required|string|min:6|max:50',
//         ]);

//         if ($validator->fails()) {
//             return response()->json(['error' => $validator->errors(), 'status' => 400], 400);
//         }

//         // Attempt to authenticate
//         if (!$token = Auth::attempt($req->only('email', 'password'))) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Invalid login credentials.',
//             ], 401);
//         }

//         // Return response with token
//         return response()->json([
//             'success' => true,
//             'token' => $token,
//             'token_type' => 'Bearer',
//             'expires_in' => auth()->factory()->getTTL() * 60, // Token expiration time in seconds
//             'status' => 200,
//         ], 200);

//     } catch (\Exception $e) {
//         return response()->json([
//             'success' => false,
//             'message' => $e->getMessage(),
//             'status' => 500,
//         ], 500);
//     }
// }

    //Generate token
    protected function respondWithToken($token)
    {
        try {
            return response()->json([
                'success' => true,
                'token' => $token,
                'token_type' => 'Bearer',
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

    //Get profile details using tokens
    public function getProfile(Request $req)
    {
        try {
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            } else {
                $id = Auth::guard('api')->user()->id;
            }
            $user = User::find($id);
            $detail = PersonalizeDetail::where('user_id', $user->id)->first();
            $user['nakshatraId'] =$detail->nakshatraId;
            $user['zodiac_sign'] =$detail->zodiac_sign;
            $user['zodiac_sun_sign'] =$detail->zodiac_sun_sign;
            $user['current_location'] =$detail->current_location;
            $user['lat'] =$detail->lat;
            $user['lon'] =$detail->lon;
            $user['tz'] =$detail->tz;
        
            // $userWallet = UserWallet::query()
            //     ->where('userId', '=', $id)
            //     ->get();
            // if ($userWallet && count($userWallet) > 0) {
            //     $user->totalWalletAmount = $userWallet[0]->amount;
            // } else {
            //     $user->totalWalletAmount = 0;
            // }
            $systemFlag = DB::Table('systemflag')
                ->get();
            // $user->systemFlag = $systemFlag;
            return response()->json([
                'success' => true,
                'data' => $user,
                'zodiac_data' => $detail ?? '',
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

    //Active/InActive user
    public function activeUser(Request $req, $id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                $user->isActive = $req->isActive;
                $user->update();
                return response()->json([
                    'message' => 'User status change sucessfully',
                    'user' => $user,
                    'status' => 200,
                ], 200);
            } else {
                return response()->json(['message' => 'User status not change.', 'status' => 404], 404);
            }
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    //Delete user
    public function deleteUser(Request $req)
    {
        try {
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            } else {
                $userId = Auth::guard('api')->user()->id;
            }
            $id = $req->id ? $req->id : $userId;
            error_log($req->id);
            $user = User::find($id);

            if ($user) {
                return response()->json(['message' => 'User delete Sucessfully', 'status' => 200], 200);
            } else {
                return response()->json(['message' => 'No user found', 'status' => 404], 404);
            }
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    //Login customer
    public function loginAppUser(Request $req)
    {
        try {
            $credentials = $req->only('contactNo','email');

            //Valid credential
            if($req->contactNo){
                $validator = Validator::make($credentials, [
                    'contactNo' => 'required',
                ]);
            }elseif($req->email){
                $validator = Validator::make($credentials, [
                    'email' => 'required',
                ]);
            }


            if($req->contactNo){
                $id = DB::table('users')
                ->join('user_roles', 'users.id', '=', 'user_roles.userId')
                ->where('contactNo', '=', $req->contactNo)
                ->where('user_roles.roleId', '=', $req->roleId = 3)
                ->select('users.id')
                ->get();
            }elseif($req->email){
                $id = DB::table('users')
                ->join('user_roles', 'users.id', '=', 'user_roles.userId')
                ->where('email', '=', $req->email)
                ->where('user_roles.roleId', '=', $req->roleId = 3)
                ->select('users.id')
                ->get();
            }



            if (count($id) > 0) {

                //Send failed response if request is not valid
                if ($validator->fails()) {
                    return response()->json([
                        'error' => $validator->errors(),
                        'status' => 400,
                    ], 400);
                }

                //token
                if (!$token = Auth::guard('api')->attempt($validator->validate())) {
                    return response()->json([
                        'error' => false,
                        'message' => 'Contact number is incorrect',
                        'status' => 401,
                        'recordList' => $id,
                    ], 401);
                } else {
                    if ($req->userDeviceDetails) {

                        if($req->contactNo){
                            $userDeviceDetail = DB::table('user_device_details')
                            ->join('users', 'users.id', '=', 'user_device_details.userId')
                            ->where('users.contactNo', '=', $req->contactNo)
                            ->select('user_device_details.*')
                            ->get();
                        }
                        if($req->email){
                            $userDeviceDetail = DB::table('user_device_details')
                            ->join('users', 'users.id', '=', 'user_device_details.userId')
                            ->where('users.email', '=', $req->email)
                            ->select('user_device_details.*')
                            ->get();
                            // dd($userDeviceDetail);
                        }
                        if ($userDeviceDetail && empty($userDeviceDetail)) {
                            $userDeviceDetail = UserDeviceDetail::create([
                                'userId' => $id[0]->id,
                                'appId' => $req->userDeviceDetails['appId'],
                                'deviceId' => $req->userDeviceDetails['deviceId'],
                                'fcmToken' => $req->userDeviceDetails['fcmToken'],
                                'deviceLocation' => $req->userDeviceDetails['deviceLocation'],
                                'deviceManufacturer' => $req->userDeviceDetails['deviceManufacturer'],
                                'deviceModel' => $req->userDeviceDetails['deviceModel'],
                                'appVersion' => $req->userDeviceDetails['appVersion'],
                            ]);
                        } else {
                            $userDeviceDetail = UserDeviceDetail::find($userDeviceDetail[0]->id);
                            if ($userDeviceDetail) {
                                $userDeviceDetail->appId = $req->userDeviceDetails['appId'];
                                $userDeviceDetail->deviceId = $req->userDeviceDetails['deviceId'];
                                $userDeviceDetail->fcmToken = $req->userDeviceDetails['fcmToken'];
                                $userDeviceDetail->deviceLocation = $req->userDeviceDetails['deviceLocation'];
                                $userDeviceDetail->deviceManufacturer = $req->userDeviceDetails['deviceManufacturer'];
                                $userDeviceDetail->deviceModel = $req->userDeviceDetails['deviceModel'];
                                $userDeviceDetail->appVersion = $req->userDeviceDetails['appVersion'];
                                $userDeviceDetail->updated_at = Carbon::now()->timestamp;
                                $userDeviceDetail->update();

                            }

                        }

                    }
                }

                //Go to token generation
                return $this->respondWithTokenApp($token, $id);
            } else {

                return $this->addAppUser($req, $id);
            }
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    //Generate token
    protected function respondWithTokenApp($token, $id)
    {
        try {
            return response()->json([
                'success' => true,
                'token' => $token,
                'token_type' => 'Bearer',
                'status' => 200,
                'recordList' => $id[0],
            ], 200);
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    public function getUserById(Request $req)
    {
        try {

            $data = $req->only([
                'userId',
            ]);
            $validator = Validator::make($data, [
                'userId' => 'required',
            ]);

            //Send failed response if request is not valid
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'status' => 400], 400);
            }

            $user = DB::table('users')
                ->where('id', '=', $req->userId)
                ->get();
            if ($user) {
                $follower = DB::table('astrologer_followers')
                    ->join('astrologers', 'astrologer_followers.astrologerId', '=', 'astrologers.id')
                    ->where('astrologer_followers.userId', '=', $req->userId)
                    ->select('astrologers.*', 'astrologer_followers.created_at as followingDate')
                    ->orderBy('astrologer_followers.id', 'DESC')
                    ->get();
                if ($follower && count($follower) > 0) {
                    foreach ($follower as $follow) {
                        $languages = DB::table('languages')
                            ->whereIn('id', explode(',', $follow->languageKnown))
                            ->select('languageName')
                            ->get();

                        $allSkill = DB::table('skills')
                            ->whereIn('id', explode(',', $follow->languageKnown))
                            ->get('name');
                        $follow->languageKnown = $languages;
                        $follow->allSkill = $allSkill;
                    }
                }
                $orderRequest = DB::table('order_request')
                    ->join('product_categories', 'product_categories.id', '=', 'order_request.productCategoryId')
                    ->join('astromall_products', 'astromall_products.id', '=', 'order_request.productId')
                    ->join('order_addresses', 'order_addresses.id', '=', 'order_request.orderAddressId')
                    ->where('order_request.userId', '=', $req->userId)
                    ->where('order_request.orderType', '=', 'astromall');

                $orderRequestCount = $orderRequest->count();
                $orderRequest->select('order_request.*', 'product_categories.name as productCategory',
                    'astromall_products.productImage', 'astromall_products.amount as productAmount',
                    'astromall_products.description', 'order_addresses.name as orderAddressName',
                    'order_addresses.phoneNumber', 'order_addresses.flatNo', 'order_addresses.locality',
                    'order_addresses.landmark', 'order_addresses.city', 'order_addresses.state',
                    'order_addresses.country', 'order_addresses.pincode', 'astromall_products.name as productName'
                );
                $orderRequest->orderBy('order_request.id', 'DESC');
                if ($req->startIndex && $req->fetchRecord) {
                    $orderRequest->skip($req->startIndex);
                    $orderRequest->take($req->fetchRecord);
                }
                $orderRequest->get();

                $giftList = DB::table('astrologer_gifts')
                    ->join('gifts', 'gifts.id', 'astrologer_gifts.giftId')
                    ->join('astrologers as astro', 'astro.id', '=', 'astrologer_gifts.astrologerId')
                    ->where('astrologer_gifts.userId', '=', $req->userId);

                $giftListCount = $giftList->count();
                $giftList->select('gifts.name as giftName', 'astrologer_gifts.*', 'astro.id as astrologerId', 'astro.name as astrolgoerName', 'astro.contactNo');

                $giftList->orderBy('astrologer_gifts.id', 'DESC');
                if ($req->startIndex && $req->fetchRecord) {
                    $giftList->skip($req->startIndex);
                    $giftList->take($req->fetchRecord);
                }
                $giftList->get();

                $chatHistory = DB::Table('chatrequest')
                    ->join('astrologers as astro', 'astro.id', '=', 'chatrequest.astrologerId')
                    ->where('chatrequest.userId', '=', $req->userId)
                    ->where('chatrequest.chatStatus', '=', 'Completed');

                $chatHistoryCount = $chatHistory->count();
                $chatHistory->select('chatrequest.*', 'astro.id as astrologerId', 'astro.name as astrologerName', 'astro.contactNo', 'astro.profileImage', 'astro.charge');
                $chatHistory->orderBy('chatrequest.id', 'DESC');
                if ($req->startIndex && $req->fetchRecord) {
                    $chatHistory->skip($req->startIndex);
                    $chatHistory->take($req->fetchRecord);
                }
                $chatHistory->get();

                $callHistory = DB::Table('callrequest')
                    ->join('astrologers', 'astrologers.id', '=', 'callrequest.astrologerId')

                    ->where('callrequest.userId', '=', $req->userId)
                    ->where('callrequest.callStatus', '=', 'Completed');
                $callHistoryCount = $callHistory->count();
                $callHistory->select('callrequest.*', 'astrologers.id as astrologerId', 'astrologers.name as astrologerName', 'astrologers.contactNo', 'astrologers.profileImage', 'astrologers.charge');
                $callHistory->orderBy('callrequest.id', 'DESC');

                if ($req->startIndex && $req->fetchRecord) {
                    $callHistory->skip($req->startIndex);
                    $callHistory->take($req->fetchRecord);
                }
                $callHistory->get();

                $reportHistory = DB::Table('user_reports')
                    ->join('astrologers', 'astrologers.id', '=', 'user_reports.astrologerId')
                    ->join('report_types', 'report_types.id', '=', 'user_reports.reportType')
                    ->where('user_reports.userId', '=', $req->userId);

                $reportHistoryCount = $reportHistory->count();

                $reportHistory->select('user_reports.*', 'astrologers.id as astrologerId', 'astrologers.name as astrologerName', 'astrologers.contactNo', 'report_types.title', 'astrologers.profileImage', 'astrologers.charge');

                $reportHistory->orderBy('user_reports.id', 'DESC');
                if ($req->startIndex && $req->fetchRecord) {
                    $reportHistory->skip($req->startIndex);
                    $reportHistory->take($req->fetchRecord);
                }
                $reportHistory->get();

                $wallet = DB::table('wallettransaction')
                    ->leftjoin('order_request', 'order_request.id', '=', 'wallettransaction.orderId')
                    ->leftjoin('astrologers', 'astrologers.id', '=', 'wallettransaction.astrologerId')
                    ->where('wallettransaction.userId', '=', $req->userId);
                $walletCount = $wallet->count();
                $wallet->select('wallettransaction.*', 'astrologers.name', 'order_request.totalMin');
                $wallet->orderBy('wallettransaction.id', 'DESC');
                if ($req->startIndex && $req->fetchRecord) {
                    $wallet->skip($req->startIndex);
                    $wallet->take($req->fetchRecord);
                }
                $wallet->get();

                $payment = DB::table('payment')
                    ->where('userId', '=', $req->userId)
                    ->orderBy('id', 'DESC');
                $paymentCount = $payment->count();
                if ($req->startIndex && $req->fetchRecord) {
                    $payment->skip($req->startIndex);
                    $payment->take($req->fetchRecord);
                }
                $payment->get();

                $orderRequests = array(
                    'totalCount' => $orderRequestCount,
                    'order' => $orderRequest,
                );
                $giftLists = array(
                    'totalCount' => $giftListCount,
                    'gifts' => $giftList,
                );
                $chatHistorys = array(
                    'totalCount' => $chatHistoryCount,
                    'chatHistory' => $chatHistory,
                );
                $callHistorys = array(
                    'totalCount' => $callHistoryCount,
                    'callHistory' => $callHistory,
                );
                $reportHistorys = array(
                    'totalCount' => $reportHistoryCount,
                    'reportHistory' => $reportHistory,
                );
                $wallets = array(
                    'totalCount' => $walletCount,
                    'wallet' => $wallet,
                );
                $payments = array(
                    'totalCount' => $paymentCount,
                    'payment' => $payment,
                );

                $user[0]->follower = $follower;
                $user[0]->orders = $orderRequests;
                $user[0]->sendGifts = $giftLists;
                $user[0]->chatRequest = $chatHistorys;
                $user[0]->callRequest = $callHistorys;
                $user[0]->reportRequest = $reportHistorys;
                $user[0]->walletTransaction = $wallets;
                $user[0]->paymentLogs = $payments;

                return response()->json([
                    "message" => "Get User Successfully",
                    "status" => 200,
                    "recordList" => $user,
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

    public function addAppUser(Request $req)
    {
        try {
            DB::beginTransaction();



            if($req->contactNo){
                $data = $req->only(
                    'contactNo',
                );
            }else{
                $data = $req->only(
                    'email',
                );
            }

            //Validate the data
            if($req->contactNo){
                $validator = Validator::make($data, [
                    'contactNo' => 'required|max:10|unique:users,contactNo',
                ]);
            }elseif($req->email){
                $validator = Validator::make($data, [
                    'email' => 'required|email|unique:users,email',
                ]);
            }


            if ($validator->fails()) {
                DB::rollback();
                return response()->json(['error' => $validator->messages(), 'status' => 400], 400);
            }
            error_log($req->name);
            //Create a new user
            $user = User::create([
                'name' => $req->name ? $req->name : '',
                'contactNo' => $req->contactNo,
                'email' => $req->email ? $req->email : '',
                'password' => $req->password ? Hash::make($req->password) : null,
                'birthDate' => $req->birthDate,
                'birthTime' => $req->birthTime,
                'birthPlace' => $req->birthPlace,
                'addressLine1' => $req->addressLine1,
                'location' => $req->location,
                'pincode' => $req->pincode,
                'gender' => $req->gender,
                'countryCode' => $req->countryCode,
            ]);

            if ($req->profile) {
                $time = Carbon::now()->timestamp;
                $imageName = 'user_' . $user->id;
                $path = DESTINATIONPATH . $imageName . $time . '.png';
                file_put_contents($path, base64_decode($req->profile));
            } else {
                $path = null;
            }
            $user->profile = $path;
            $user->update();

            UserRole::create([
                'userId' => $user->id,
                'roleId' => 3,
            ]);
            if ($req->userDeviceDetails && $req->userDeviceDetails['fcmToken']) {
                UserDeviceDetail::create([
                    'userId' => $user->id,
                    'appId' => 1,
                    'deviceId' => $req->userDeviceDetails['deviceId'] ? $req->userDeviceDetails['deviceId'] : '',
                    'fcmToken' => $req->userDeviceDetails['fcmToken'] ? $req->userDeviceDetails['fcmToken'] : '',
                    'deviceLocation' => $req->userDeviceDetails['deviceLocation'] ? $req->userDeviceDetails['deviceLocation'] : '',
                    'deviceManufacturer' => $req->userDeviceDetails['deviceManufacturer'] ? $req->userDeviceDetails['deviceManufacturer'] : '',
                    'deviceModel' => $req->userDeviceDetails['deviceModel'] ? $req->userDeviceDetails['deviceModel'] : '',
                    'appVersion' => $req->userDeviceDetails['appVersion'] ? $req->userDeviceDetails['appVersion'] : '',
                ]);
            }else{
                UserDeviceDetail::create([
                    'userId' => $user->id,
                    'appId' => 1,

                ]);
            }
            //Create token
            try {
                if (!$token = Auth::guard('api')->attempt($data)) {
                    DB::rollback();
                    return response()->json([
                        'success' => false,
                        'message' => 'Login credentials are invalid.',
                        'data' => $data,
                    ], 400);
                }
            } catch (JWTException $e) {
                DB::rollback();
                return response()->json([
                    'success' => false,
                    'message' => 'Could not create token.',
                ], 500);
            }

            $id = ['id' => $user->id];
            DB::commit();
            //Json response
            return response()->json([
                'success' => true,
                'token' => $token,
                'token_type' => 'Bearer',
                'status' => 200,
                'message' => 'User add sucessfully',
                'recordList' => $id,
            ], 200);
        } catch (\Exception$e) {
            DB::rollback();
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

 public function logout(Request $req)
    {
        try {
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            }
            $id=Auth::guard('api')->user()->id;
            $userDeviceDetail = UserDeviceDetail::where('userId', $id)->first();
            if ($userDeviceDetail) {

                $userDeviceDetail->fcmToken = null;
                $userDeviceDetail->updated_at = Carbon::now()->timestamp;
                $userDeviceDetail->update();

            }

            return response()->json([
                "message" => "Logout User Successfully",
                "status" => 200,
                "recordList" => [],
            ], 200);
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    // public function updateUserProfile(Request $req)
    // {
    //     try {
    //         if (!Auth::guard('api')->user()) {
    //             return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
    //         } else {
    //             $id = Auth::guard('api')->user()->id;
    //         }

    //         if (!file_exists(public_path('storage/images'))) {
    //             mkdir(public_path('storage/images'), 0777, true);
    //         }

    //         if ($req->profile) {
    //             if (Str::contains($req->profile, 'storage')) {
    //                 $path = $req->profile;
    //             } else {
    //                 $time = Carbon::now()->timestamp;
    //                 $imageName = 'profile_' . $id;
    //                 $path = DESTINATIONPATH . $imageName . $time . '.png';
    //                 File::delete(Auth::guard('api')->user()->profile);
    //                 file_put_contents($path, base64_decode($req->profile));
    //             }
    //         } else {
    //             $path = null;
    //         }
    //         $data = array(
    //             'profile' => $path,
    //         );
    //         DB::table('users')->where('id', '=', $id)->update($data);
    //         return response()->json([
    //             'status' => 200,
    //             "message" => "Update Profile Successfully",
    //         ], 200);
    //     } catch (\Exception$e) {
    //         return response()->json([
    //             'error' => false,
    //             'message' => $e->getMessage(),
    //             'status' => 500,
    //         ], 500);
    //     }
    // }

    public function updateUserProfile(Request $request)
{
    try {
        // Check if user is authenticated
        $user = Auth::guard('api')->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
        }

        $id = $user->id;

        $userProfile = User::findOrFail($id);

        // Ensure storage directory exists
        // $storagePath = storage_path('app/public/images');
        // if (!file_exists($storagePath)) {
        //     mkdir($storagePath, 0777, true);
        // }

        $path = null;
        
        if ($request->hasFile('profile')) {
            // Delete old thumbnail
            if ($userProfile->profile) {
                Storage::disk('public')->delete($userProfile->profile);
            }
            $thumbnailPath = $request->file('profile')->store('thumbnails', 'public');
            $userProfile->profile = $thumbnailPath;
        }

        $userProfile->save();
        // if ($req->profile) {
        //     if (Str::contains($req->profile, 'storage')) {
        //         $path = $req->profile; // Keep existing image if already stored
        //     } else {
        //         // Generate a new file name
        //         $time = Carbon::now()->timestamp;
        //         $imageName = 'profile_' . $id . '_' . $time . '.png';
        //         $path = 'images/' . $imageName;

        //         // Delete old profile image
        //         if ($user->profile) {
        //             File::delete(storage_path('app/public/' . str_replace('storage/', '', $user->profile)));
        //         }

        //         // Save the new profile image
        //         Storage::disk('public')->put($path, base64_decode($req->profile));

        //         // Convert to accessible URL
        //         $path = Storage::url($path);

        //     }
        // }

        // // Update user profile in database
        // DB::table('users')->where('id', '=', $id)->update(['profile' => $path]);

        return response()->json([
            'status' => 200,
            "message" => "Profile updated successfully",
            "profile_url" => $userProfile
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'error' => true,
            'message' => $e->getMessage(),
            'status' => 500,
        ], 500);
    }
}


public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Generate OTP
        $otp = rand(100000, 999999);

        // Store OTP in password_resets table
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $otp, 'created_at' => Carbon::now()]
        );

        // Send OTP via email
        Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Password Reset OTP');
        });

        return response()->json(['message' => 'OTP sent successfully'], 200);
    }

    public function verifyOTP(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'otp' => 'required|numeric|min:6',
    ]);

    $otpData = DB::table('password_resets')
                 ->where('email', $request->email)
                 ->where('token', $request->otp)
                 ->first();

    if (!$otpData) {
        return response()->json(['error' => 'Invalid OTP'], 400);
    }

    return response()->json(['email'=>$request->email,'message' => 'OTP verified successfully'], 200);
}



public function resetPassword(Request $request)
{
    
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password',
        
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }


        
    $user = User::where('email', $request->email)->first();
    if(!empty($user)){
    $user->password = Hash::make($request->password);
    $user->save();

    return response()->json(['email'=>$request->email, 'message'=>'Password has been reset successfully']);
    } else {

        return response()->json(['email'=>$request->email, 'message'=>'Please enter correct current email.']);
    }


    // return $status === Password::PASSWORD_RESET
    //     ? response()->json(['message' => 'Password has been reset successfully.'])
    //     : response()->json(['message' => 'Failed to reset password.'], 500);
}
// public function resetPassword(Request $request)
// {
//     $request->validate([
//         'email' => 'required|email|exists:users,email',
//         'otp' => 'required|numeric|min:6',
//         'password' => 'required|string|min:6|confirmed',
//     ]);

//     // Check OTP
//     $otpData = DB::table('password_resets')
//                  ->where('email', $request->email)
//                  ->where('token', $request->otp)
//                  ->first();

//     if (!$otpData) {
//         return response()->json(['error' => 'Invalid OTP'], 400);
//     }

//     // Update password
//     $user = User::where('email', $request->email)->first();
//     $user->password = bcrypt($request->password);
//     $user->save();

//     // Delete OTP record
//     DB::table('password_resets')->where('email', $request->email)->delete();

//     return response()->json(['message' => 'Password reset successful'], 200);
// }


  

}
