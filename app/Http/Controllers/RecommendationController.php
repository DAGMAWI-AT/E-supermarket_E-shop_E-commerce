<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\User;

use GuzzleHttp\Client;

class RecommendationController extends Controller
{
    public function getRecommendations(Request $request)
    {
        $client = new Client();
        $response = $client->post('http://127.0.0.1:5000/Conditioner', [
            'json' => $request->all(),  // Pass user data to Flask server
        ]);

        $recommendations = json_decode($response->getBody(), true);
        dd(recommendations);
        // Process and display the recommendations in your Laravel application
       // return view('recommendations', ['recommendations' => $recommendations]);
    }
}
