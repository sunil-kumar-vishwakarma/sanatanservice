<?php

// app/Http/Controllers/CustomerController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
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

class CustomerController extends Controller
{
    public function index(Request $req)
    {

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
           $userdata = $user->get();
           $userdataCount = $userCount->count();
        //    print_r($userdata);die;
            // return response()->json([
            //     'recordList' => $user->get(),
            //     'status' => 200,
            //     'totalRecords' => $userCount->count(),
            // ], 200);
        // You can fetch customer data from the database here and pass it to the view
        return view('admin.customers', compact('userdata','userdataCount'));
    }

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
            $validator = Validator::make($data, [
                'contactNo' => 'required|max:10|unique:users,contactNo',
            ]);

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

    public function addcustomer()
    {
        return view('admin.addcustomer');
    }
    public function editcustomer()
    {
        return view('admin.editcustomer');
    }

}
