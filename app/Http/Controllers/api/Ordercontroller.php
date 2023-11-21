<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\models\castomer;
use App\Models\Order;
use App\Models\OrderItem;
use App\models\Products;
use App\models\shopcartitems;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class Ordercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Log::channel('errors')->error('2', [

            'class' => $request,

        ]);

        $user = auth()->user();
        if ($user->role == 'admin' || $user->role == 'employee') {
            $order = new Order();
            if ($request->customer_number == 1) {
                $order->castomer_id = 1;
                $order->user_id = $user->id;

            } else {
                $order->castomer_id = castomer::where('customer_number', $request->customer_number)->first()->id;
                $order->user_id = castomer::where('customer_number', $request->customer_number)->first()->user->id;

            }
            //  $order->castomer_id = castomer::where('customer_number', $request->customer_number)->first()->id;
            $order->drawer_id = $request->drawer_id;
            $order->total = $request->total;
            $order->status = 'Betaald';
            $order->date = $date = Carbon::now()->addHour(1)->format('Y-m-d');
            $order->save();
            $order_id = $order->id;

            $shopcartitems = shopcartitems::where('customer_id', 1)->where('user_id', $user->id)->where('drawer_id', $request->drawer_id)->get();

            foreach ($shopcartitems as $shopcartitem) {
                $order_item = new OrderItem();
                $order_item->order_id = $order_id;
                $order_item->product_id = $shopcartitem->product_id;
                $order_item->quantity = $shopcartitem->quantity;
                $order_item->price = $shopcartitem->shopcartitem_price;
                $order_item->discount_percentage = $shopcartitem->discount_percentage;
                $order_item->save();
                $product = Products::where('id', $shopcartitem->product_id)->first();
                $product->stock = $product->stock - $shopcartitem->quantity;
                $product->save();
                $shopcartitem->delete();

            }
        } else {
            $response = new Response();
            $response->setStatusCode(403);

            return $response;
        }

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

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
