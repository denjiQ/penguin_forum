<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items');
    }

    public function create_item(Request $request)
    {
        Item::create([
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_location_num' => $request->product_location_num,
        ]);
        return view('items',
        ['ele' => "メッセージ"]);
    }
}
