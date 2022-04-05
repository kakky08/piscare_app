<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakutenRws_Client;
use SebastianBergmann\Environment\Console;

class RakutenController extends Controller
{
    public function get_rakuten_items()
    {
        $client = new RakutenRws_Client();
        define("RAKUTEN_APPLICATION_ID", config('app.rakuten_id'));

        $client->setApplicationId('1012872856628443358');

        $response = $client->execute('RecipeCategoryList');

        /* $response = $client->execute('IchibaItemSearch', array(
            'keyword' => 'うどん'
        )); */

        if (!$response->isOk()) {
            // dd($response);
            return 'Error:' . $response->getMessage();
        } else {
            $medium = array();
            $result = $response['result'];
            // dd($result['medium']);
            foreach ($result['medium'] as $key => $value) {
                if($value['parentCategoryId'] === '11')
                {
                    $medium[$key] = $value;
                }
                // dd($value['parentCategoryId'] );
            }
            /* foreach ($response['result'] as $key => $medium) {
                // 利用データを配列に代入
                $medium['medium'][$key] = $medium['categoryName'];
                /* if ($rekutenItem['imageFlag']) {
                    $imgSrc = $rekutenItem['mediumImageUrls'][0]['imageUrl'];
                    $items[$key]['img_src'] = preg_replace('/^http:/', 'https:', $imgSrc);
                } */
            // return response()->json($response->getData());
            // return $items;

            dd($medium);
        }



    }
}
