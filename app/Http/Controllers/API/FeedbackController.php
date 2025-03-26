<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserModel\AppReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Contactus;
use App\Models\UserFeedback;

use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public $path;
    public $limit = 15;
    public $paginationStart;
    public function getAppFeedback(Request $request)
    {
        try {
            // if (Auth::guard('web')->check()) {
                $page = $request->page ? $request->page : 1;
                $paginationStart = ($page - 1) * $this->limit;

                // $feedback = AppReview::select('app_reviews.*', 'users.name', 'users.contactNo', 'users.profile')
                // ->join('users', 'users.id', '=', 'app_reviews.userId')
                // ->orderBy('app_reviews.id', 'DESC');

                $feedback = UserFeedback::with('user')->get();

                $totalRecords = $feedback->count();

                // Adjust page number if it exceeds total pages
                $totalPages = ceil($totalRecords / $this->limit);
                $page = min($page, $totalPages);

                // Retrieve feedback for the current page

                // $feedback = $feedback->skip($paginationStart)
                //     ->take($this->limit)
                //     ->orderBy('app_reviews.id', 'DESC')
                //     ->get();
                $feedback = UserFeedback::with('user')->get();
                // Calculate start and end records for the current page
                $start = ($this->limit * ($page - 1)) + 1;
                $end = min($this->limit * $page, $totalRecords);

                // return view('pages.app-feedback', compact('feedback', 'totalPages', 'totalRecords', 'start', 'end', 'page'));
                return response()->json([
                    'success' => true,
                    'data' => $feedback,
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

    public function store(Request $request)
    {
        try {
        // Validate the input
            if (!Auth::guard('api')->user()) {
                return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
            } else {
                $id = Auth::guard('api')->user()->id;
            }

        $validator = Validator::make($request->all(), [
            // 'email' => 'required|email',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        
        $user = Auth::guard('api')->user();
        // print_r($user->id);die;
        // Store the feedback
        $feedback = UserFeedback::create([
            'user_id' => $user->id,
            'rating' => $request->rating,
            'feedback' => $request->message,
            'status'=>'1'
        ]);


        return response()->json([
            'success' => true,
            'message' => 'Feedback submitted successfully!',
            'feedback' => $feedback,
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


    #-------------------------------------------------------------------------------------------------------------------------------------------------------
    public function contactList(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                $page = $request->page ? $request->page : 1;
                $paginationStart = ($page - 1) * $this->limit;

                $contacts = Contactus::orderBy('id', 'DESC')
                ->skip($paginationStart)
                ->take($this->limit)
                ->get();

                $totalRecords = $contacts->count();

                $totalPages = ceil($totalRecords / $this->limit);
                $page = min($page, $totalPages);

                $start = ($this->limit * ($page - 1)) + 1;
                $end = min($this->limit * $page, $totalRecords);

                return view('pages.contactlist', compact('contacts', 'totalPages', 'totalRecords', 'start', 'end', 'page'));
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

}
