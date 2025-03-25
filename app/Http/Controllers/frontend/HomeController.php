<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\BannerManagement;

class HomeController extends Controller
{
  
    public function home(Request $request)
    {
        $banners = BannerManagement::all();
        // print_r($banners);die;
        return view('frontend.pages.index', compact('banners'));
    }
    public function talkastrologer(Request $request)
    {
        return view('frontend.pages.talkastrologer');
    }

    public function astrologerChatList(Request $request)
    {
        return view('frontend.pages.chatlist');
    }

    public function astrologerChat(Request $request)
    {
        return view('frontend.pages.chatp');
    }

    public function about(Request $request)
    {
        return view('frontend.pages.about');
    }
    public function contact(Request $request)
    {
        return view('frontend.pages.contact');
    }

    public function blog(Request $request)
    {
        return view('frontend.pages.blog');
    }


    public function privacy(Request $request)
    {
        return view('frontend.pages.privacy');
    }

    public function term(Request $request)
    {
        return view('frontend.pages.term');
    }

    // public function getAstrologerStories($id)
    // {
    //     $twentyFourHoursAgo = Carbon::now()->subHours(24);


    //     $stories = AstrologerStory::select('*', DB::raw('(Select Count(story_view_counts.id) as StoryViewCount from story_view_counts where storyId=astrologer_stories.id) as StoryViewCount'))
    //         ->where('created_at', '>=', $twentyFourHoursAgo)
    //         ->where('created_at', '<=', Carbon::now())
    //         ->where('astrologerId', $id)
    //         ->orderBy('created_at', 'DESC')
    //         ->get();


    //     return response()->json($stories);
    // }



    // public function viewstory(Request $req)
    // {
    //     try {

    //         $id = authcheck()['id'] ? authcheck()['id'] : 0;
    //         // Check if the combination of userId and storyId already exists
    //         if (DB::table('story_view_counts')->where('userId', $id)->where('storyId', $req->storyId)->exists()) {
    //             return response()->json(['message' => 'Story already viewed', 'status' => 200], 200);
    //         }

    //         // Insert data into story_view_counts table
    //         $countview = DB::table('story_view_counts')->insert([
    //             'userId' => $id,
    //             'storyId' => $req->storyId,
    //         ]);

    //         if ($countview) {
    //             return response()->json(['message' => 'Story Viewed successfully', 'status' => 200], 200);
    //         } else {
    //             return response()->json(['error' => 'Failed to insert data', 'status' => 500], 500);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'error' => false,
    //             'message' => $e->getMessage(),
    //             'status' => 500,
    //         ], 500);
    //     }
    // }
}
