<?php

// app/Http/Controllers/AstrologerController.php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\AdminModel\DefaultProfile;
use App\Models\UserModel\User;
use App\Models\Temple;


class ApiTempleController extends Controller
{
    public function templeList()
    {
        $temp = Temple::all();
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
                'data' => $temp,
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
    public function view()
    {
        return view('admin.temple.view');
    }


}
