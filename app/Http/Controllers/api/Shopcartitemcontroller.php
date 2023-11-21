<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\shopcartitems;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class Shopcartitemcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $drawer_id = request()->drawer_id;

        if ($user->role == 'admin' || $user->role == 'employee') {
            $data = shopcartitems::join('products', 'products.id', '=', 'shopcartitems.product_id')->where('shopcartitems.customer_id', 1)->where('shopcartitems.drawer_id', $drawer_id)
                ->where('shopcartitems.user_id', $user->id)
                ->select('shopcartitems.*', 'products.name', 'products.barcode', 'products.selling_price as price', 'products.image', 'products.stock')
                ->get();

            foreach ($data as $item) {
                $item->price = $item->price;
                $item->price = number_format($item->price, 2, '.', '');
                $item->shopcartitem_price = number_format($item->shopcartitem_price, 2, '.', '');

            }

            if ($data != null) {
                $response = new Response();
                $response->setStatusCode(200);
                $response->setContent($data);
            } else {
                $response = new Response();
                $response->setStatusCode(404);
            }

            return $response;
        } else {
            $response = new Response();
            $response->setStatusCode(403);

            return $response;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($request->has('barcode') && $request->has('quantity') && $request->has('drawer_id')) {
            if ($user->role == 'admin' || $user->role == 'employee') {
                $product_barcode = request()->barcode;
                $quantity = request()->quantity;
                $drawer_id = request()->drawer_id;
                $product = Products::where('barcode', $product_barcode)->first();
                $product_price = $product->selling_price;
                // Check if there is already a cart item with the matching customer_id and product_id
                $cart = shopcartitems::where('customer_id', 1)->where('product_id', $product->id)->where('drawer_id', $drawer_id)->first();

                if ($cart) {
                    // If a cart item is found, update the quantity
                    $cart->quantity += $quantity;
                    if ($product->discount_percentage == 0) {
                        $cart->shopcartitem_price = $product->selling_price * $cart->quantity;
                        $cart->discount_percentage = 0;

                    } else {
                        $cart->shopcartitem_price = ($product_price - (($product_price * $product->discount_percentage) / 100)) * $cart->quantity;
                        $cart->discount_percentage = $product->discount_percentage;
                    }
                    $cart->save();
                    if ($cart != null) {
                        $response = new Response();
                        $response->setStatusCode(201);
                        $response->setContent($cart);
                    } else {
                        $response = new Response();
                        $response->setStatusCode(404);
                    }

                    return $response;
                } else {
                    // If no cart item is found, create a new one
                    $cart = new shopcartitems();
                    $cart->user_id = auth()->user()->id;
                    $cart->customer_id = 1;
                    $cart->drawer_id = $drawer_id;
                    $cart->product_id = $product->id;
                    $cart->quantity = $quantity;
                    if ($product->discount_percentage == 0) {

                        $cart->shopcartitem_price = $product_price * $quantity;
                        $cart->discount_percentage = 0;
                        Log::channel('errors')->error('2', [

                            'class' => $product_price,
                            'tee' => $quantity,
                            'sfesftee' => $cart->shopcartitem_price,

                        ]);
                    } else {
                        $cart->shopcartitem_price = $product_price - (($product_price * $product->discount_percentage) / 100);
                        $cart->shopcartitem_price = $product_price * $quantity;
                        $cart->discount_percentage = $product->discount_percentage;
                    }

                    $cart->save();
                    if ($cart != null) {
                        $response = new Response();
                        $response->setStatusCode(201);
                        $response->setContent($cart);
                    } else {
                        $response = new Response();
                        $response->setStatusCode(404);

                    }

                    return $response;

                }

            } else {
                $response = new Response();
                $response->setStatusCode(401);

                return $response;
            }

        } else {
            $response = new Response();
            $response->setStatusCode(400);

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
        // $user = auth()->user();
        // if ($request->has('quantity')) {
        //     if ($user->role == "admin" || $user->role == "employee") {
        //         $quantity = request()->quantity;
        //         $shopcartitem = shopcartitems::where('id', $id)->first();
        //         $product = Products::where('id', $shopcartitem->product_id)->first();
        //         $shopcartitem->quantity = $quantity;
        //         if ($product->discount_percentage == 0 ) {
        //             $shopcartitem->shopcartitem_price = $product->selling_price * $quantity;
        //             $shopcartitem->discount_percentage = 0;
        //         } else {
        //             $shopcartitem->shopcartitem_price = ($product->selling_price +(($product->selling_price * $product->discount_percentage ) / 100 )) * $quantity;
        //             $shopcartitem->discount_percentage = $product->discount_percentage;
        //         }
        //         $shopcartitem->save();
        //         if ($shopcartitem != null) {
        //             $response = new Response();
        //             $response->setStatusCode(200);
        //             $response->setContent($shopcartitem);
        //         } else {
        //             $response = new Response();
        //             $response->setStatusCode(400);
        //         }
        //         return $response;
        //     } else {
        //         $response = new Response();
        //         $response->setStatusCode(401);
        //         return $response;
        //     }
        // } else {
        //     $response = new Response();
        //     $response->setStatusCode(400);
        //     return $response;
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        if ($user->role == 'admin' || $user->role == 'employee') {

            $shopcartitem = shopcartitems::where('id', $id)->first();
            if ($shopcartitem == null) {
                $response = new Response();
                $response->setStatusCode(500);

                return $response;
            } else {
                $shopcartitem->delete();
                $response = new Response();
                $response->setStatusCode(202);
                $response->setContent($shopcartitem);
            }

        } else {
            $response = new Response();
            $response->setStatusCode(401);

        }

        return $response;

    }
}
