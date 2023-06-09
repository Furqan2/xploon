<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    
    //** */
    // Function to call data with view 
    public function getUserData()
    {
        $user = new User();
        $userData = $user->getUserName();
        $Client = new \GuzzleHttp\Client();
        $res = $Client->request('GET', env('GIVEN_URL')); // GET DATA URL FROM ENV
        $data = $res->getBody()->getContents();
        $data = json_decode($data);
        return view('dashboard', compact('data', 'userData'));
    }
    // function to call data in ajax call
    public function refreshedData()
    {

        $Client = new \GuzzleHttp\Client();
        $res = $Client->request('GET',  env('GIVEN_URL'));  // GET DATA URL FROM ENV
        $data = $res->getBody()->getContents();
        $data = json_decode($data);
        return response()->json($data);
    }
}
