<?php

namespace App\Http\Controllers;

use App\Shop;
use App\ShopArea;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SearchShopController extends Controller
{
    // HTTPリクエストを送るURL
    private const REQUEST_URL = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';

    private const REQUEST_URL_AREA = 'http://webservice.recruit.co.jp/hotpepper/middle_area/v1/';

    // APIキー
    private $api_key;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $results = Shop::paginate(10);
        $areas = ShopArea::get();

        return view('shops.shops', compact('results', 'areas'));

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function search(Request $request, $page = 1)
    {
        // ベースURL
        $base_url = 'openapi.test.api.jp';

        // インスタンス作成
        $client = new Client();

        $method = 'GET';

        // 1ページあたりの取得数
        $page_count = 20;

        $this->api_key = config('hotpepper.api_key');

        $options = [
            'query' => [
                'key' => config('hotpepper.api_key'),
                'keyword' => '魚 ' . $request->search,
                'count' => $page_count,
                'start' => ($page_count * ($page - 1)) + 1,
                'format' => 'json',
            ],
        ];

        $response = $client->request($method, self::REQUEST_URL, $options);

        $restaurants = json_decode($response->getBody(), true)['results'];

        $pages = ($restaurants['results_available'] / $restaurants['results_returned']) + 1;

        return view('shops.shops', compact('restaurants', 'pages'));
    }


}
