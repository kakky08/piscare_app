<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Header;

class HotpepperController extends Controller
{
    // HTTPリクエストを送るURL
    private const REQUEST_URL = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';

    // APIキー
    private $api_key;


    public function index()
    {
        // ベースURL
        $base_url = 'openapi.test.api.jp';

        // インスタンス作成
        $client = new Client();

        $method = 'GET';

        $this->api_key = config('hotpepper.api_key');

        $options = [
            'query' => [
                'key' => config('hotpepper.api_key'),
                'keyword' => '魚',
                'count' => 10,
                'format' => 'json',
            ],
        ];

        $response = $client->request($method, self::REQUEST_URL, $options);

        $restaurants = json_decode($response->getBody(), true)['results'];

        return view('test', compact('restaurants'));

    }
}
