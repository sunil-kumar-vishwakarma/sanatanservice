<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\AdminModel\DefaultProfile;
use App\Models\UserModel\User;
use App\Models\Video;
use App\Models\Audio;
class LiveVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liveArti()
    {
        //
        $videos = Video::all();

        try {
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            } else {
                $id = Auth::guard('api')->user()->id;
            }
            $user = User::find($id);
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
            $user->systemFlag = $systemFlag;
            return response()->json([
                'success' => true,
                'data' => $videos,
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


    public function artiSong()
    {
        $audios = Audio::all();
        try {
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            } else {
                $id = Auth::guard('api')->user()->id;
            }
            $user = User::find($id);
            
            $systemFlag = DB::Table('systemflag')
                ->get();
            $user->systemFlag = $systemFlag;
            return response()->json([
                'success' => true,
                'data' => $audios,
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
