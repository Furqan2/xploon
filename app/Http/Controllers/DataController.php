<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use stdClass;

class DataController extends Controller
{
    //
    // Function to call data with view 
    public function getUserData($refresh = false)
    {
        $cacheKey = 'api-response';
        $cacheDuration = 60; // Cache duration in minutes
        $user = new User();
        $headers = [
            'id',
            'First Name',
            'Last Name',
            'Email',
            'Date'
        ];
        $userData = $user->getUserName();

        if ($refresh) {
            $Client = new \GuzzleHttp\Client();
            $res = $Client->request('GET', env('GIVEN_URL')); // GET DATA URL FROM ENV
            $dataJson = $res->getBody()->getContents();
            // $data = json_decode($data);
            $data = json_decode($dataJson, true);

            $rows = array_values($data['data']['rows']);

            Data::upsert($rows, ['id']);
            $newData = Data::get();

            Cache::put($cacheKey, $data, $cacheDuration);
            return view('dashboard', compact('newData', 'userData', 'headers'));
        } else {
            if (Cache::has($cacheKey)) {
                $data = Cache::get($cacheKey);
                $newData = Data::get();
                return view('dashboard', compact('newData', 'userData', 'headers'));
            } else {
                $Client = new \GuzzleHttp\Client();
                $res = $Client->request('GET', env('GIVEN_URL')); // GET DATA URL FROM ENV
                $dataJson = $res->getBody()->getContents();
                // $data = json_decode($data);
                $data = json_decode($dataJson, true);

                $rows = array_values($data['data']['rows']);

                Data::upsert($rows, ['id']);
                $newData = Data::get();

                Cache::put($cacheKey, $data, $cacheDuration);
                return view('dashboard', compact('newData', 'userData', 'headers'));
            }
        }

        //dd($newData);
        return view('dashboard', compact('newData', 'userData', 'headers'));
    }
}
