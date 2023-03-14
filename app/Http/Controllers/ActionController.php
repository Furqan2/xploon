<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActionController extends Controller
{
    //

    public function getUserData()
    {

        $Client = new \GuzzleHttp\Client();
        $res = $Client->request('GET', 'https://cspf-dev-challenge.herokuapp.com/');
        $data = $res->getBody()->getContents();
        $data = json_decode($data);
        return view('dashboard', compact('data'));
    }
    public function refreshedData()
    {

        $Client = new \GuzzleHttp\Client();
        $res = $Client->request('GET', 'https://cspf-dev-challenge.herokuapp.com/');
        $data = $res->getBody()->getContents();
        $data = json_decode($data);
        return response()->json($data);
    }
}
