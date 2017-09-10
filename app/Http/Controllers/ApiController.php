<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $client = null;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getApis(Request $request)
    {
        $link = $request->get('link');
        try {
            $response = $this->client->get("{$link}/apis/", [
                'verify' => false,
            ]);
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Unable to get apis from the url');
        }

        dd($response->getBody()->getContents());
    }
}
