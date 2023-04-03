<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        return view('api_view');
    }

    public function fetchData(Request $request)
    {
        $url = $request->input('url');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);
        $data = json_decode($response->getBody(), true);
        $user = $data['users'][0];

        return view('api_view', compact('user'));
    }
}