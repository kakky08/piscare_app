<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchShopRequest;
use App\Shop;
use App\ShopArea;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $shops = Shop::orderBy('created_at', 'desc')->paginate(20);
        $areas = ShopArea::get();

        return view('shops.pages.app', compact('shops', 'areas'));

    }


    public function search(SearchShopRequest $request)
    {

        $shops = Shop::when(isset($request->area), function($query) use($request)
                        {
                            return $query->where('middle_area_code', $request->area);
                        })
                        ->when(isset($request->name), function($query) use($request)
                        {
                            return $query->where('name', 'LIKE', "%$request->keyword%")
                                        ->orwhere('catch', 'LIKE', "%$request->keyword%");
                        })
                    ->orderBy('created_at', 'desc')
                    ->paginate(20);

        $areas = ShopArea::get();

        return view('shops.pages.app', compact('shops', 'areas'));
    }


}
