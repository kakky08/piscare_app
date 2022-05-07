<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Shop;
use App\ShopArea;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // HTTPリクエストを送るURL

    private const REQUEST_URL = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';

    private const REQUEST_URL_AREA = 'http://webservice.recruit.co.jp/hotpepper/middle_area/v1/';


    public function register()
    {

        $client = new Client();

        $method = 'GET';

        $this->api_key = config('hotpepper.api_key');


        /**
         * お店の数を取得
         */
        $options = [
            'query' => [
                'key' => config('hotpepper.api_key'),
                'keyword' => '魚',
                'large_service_area' => 'SS10',
                'large_area' => 'Z011',
                'format' => 'json',
            ],
        ];

        $response = $client->request($method, self::REQUEST_URL, $options);

        $results = json_decode($response->getBody(), true)['results'];

        /**
         * ページ分ループを回す
         */
        for ($i = 1; $i <  165 /* (int)($results_available / 10) */; $i++)
        {

            $options = [
                'query' => [
                    'key' => config('hotpepper.api_key'),
                    'keyword' => '魚',
                    'large_service_area' => 'SS10',
                    'large_area' => 'Z011',
                    'start' => (10 * ($i - 1)) + 1,
                    'format' => 'json',
                ],
            ];


            $response = $client->request($method, self::REQUEST_URL, $options);

            $results = json_decode($response->getBody(), true)['results'];

            for ($j = 0; $j < $results['results_returned']; $j++)
            {

                $categoryId = Shop::where('shop_id', $results['shop'][$j]['id'])->first();
                if (empty($categoryId)) {
                    Shop::create([
                        'shop_id' => $results['shop'][$j]['id'],
                        'name' => $results['shop'][$j]['name'],
                        'catch' => $results['shop'][$j]['catch'],
                        'shop_image' => $results['shop'][$j]['photo']['pc']['m'],
                        'middle_area_code' => $results['shop'][$j]['middle_area']['code'],
                        'shop_url' => $results['shop'][$j]['urls']['pc'],
                    ]);
                }
            }
        }

        return redirect()->route('admin.home')->with('successMessage', '登録に成功しました。');
    }



    public function registerArea()
    {

        // インスタンス作成
        $client = new Client();

        $method = 'GET';

        $this->api_key = config('hotpepper.api_key');

        $options = [
            'query' => [
                'key' => config('hotpepper.api_key'),
                'large_area' => 'Z011',
                'format' => 'json',
            ],
        ];

        $response = $client->request($method, self::REQUEST_URL_AREA, $options);

        $results = json_decode($response->getBody(), true)['results'];

        for ($i = 0; $i < $results['results_available']; $i++)
        {

            $middleArea = ShopArea::where('code', $results['middle_area'][$i]['code'])->first();

            if (empty($middleArea)) {
                ShopArea::create([
                    'code' => $results['middle_area'][$i]['code'],
                    'name' => $results['middle_area'][$i]['name'],
                ]);
            }
        }

        return redirect()->route('admin.home')->with('successMessage', '登録に成功しました。');
    }


}
