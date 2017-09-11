<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    protected $client = null;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getApis(Request $request)
    {
        $link = $request->get('link') ?? env('KONG_API_URL');

        try {
            $response = $this->client->get("{$link}/apis/", [
                'verify' => false,
            ]);
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Unable to get apis from the url.');
        }

        $response = json_decode($response->getBody()->getContents(), true);

        if (! $this->validateResponse($response)) {
            return redirect('/')->with('error', 'Unable to parse the response.');
        }

        $apis = $this->convertToApiResponse($response);

        return view("default.apis.index", compact('apis'));
    }

    protected function convertToApiResponse(array $response)
    {
        return collect($response['data']);
    }

    protected function validateResponse(array $response)
    {
        return isset($response['data']) && isset($response['total']);
    }

    public function editApi(Request $request, $id)
    {
        $api = json_decode(base64_decode($request->get('api')), true);

        return view("default.apis.edit", compact('id', 'api'));
    }

    public function update($id)
    {
        $json = request('json');

        $attr = request()->validate([
            'name'         => 'required',
            'upstream_url' => 'required|url',
        ]);

        $link = env('KONG_API_URL')."/apis/{$id}";

        try{
            $response = $this->client->request('PATCH', $link, [
                'form_params' => $attr,
                'verify'      => false,
            ]);
        }catch (\Exception $e){
            return redirect("/apis/{$id}/edit?api={$json}")->with('error', 'Unable to update the api.');
        }

        return redirect('/')->with('message', '');
    }
}
