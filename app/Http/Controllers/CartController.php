<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\shopcartitems;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all ShopCartItems for the current user
        // $shopCartItems = ShopCartItems::join('users', 'users.id', '=', 'shopcartitems.user_id')
        //     ->join('products', 'products.id', '=', 'shopcartitems.product_id')
        //     ->where('users.id', auth()->id())
        //     ->select('shopcartitems.*', 'products.name', 'products.selling_price', 'discount_percentage', 'products.image', 'products.stock')
        //     ->get();

        // $expected_delivery_date = Carbon::now()->addHour(1)->addDays(2)->format('d-m-Y ');

        // return view('cart', [
        //     'cartItems' => $shopCartItems,
        //     'expected_delivery_date' => $expected_delivery_date,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product_id = $request->input('product_id');
            $quantity = $request->input('quantity');

            $product = Products::find($product_id);
            if ($product->stock < $quantity) {
                return redirect()->back()->with('error', 'Geen voldoende voorraad!');
            } else {

                $product_price = $product->selling_price;

                $customer = auth()->user()->castomer;

                // Check if there is already a cart item with the matching customer_id and product_id
                $cart = shopcartitems::where('customer_id', $customer->id)->where('product_id', $product_id)->first();

                if ($cart) {
                    // If a cart item is found, update the quantity
                    if ($cart->quantity + $quantity > $product->stock) {
                        return redirect()->back()->with('error', 'Geen voldoende voorraad!');
                    } else {
                        $cart->quantity += $quantity;
                        if ($product->discount_percentage > 0) {
                            $cart->shopcartitem_price = $product_price - (($product_price * $product->discount_percentage) / 100);
                            $cart->shopcartitem_price = $product_price * $quantity;
                            $cart->shopcartitem_price = number_format($cart->shopcartitem_price, 2, '.', '');
                            $cart->discount_percentage = $product->discount_percentage;
                        } else {
                            $cart->shopcartitem_price = $product_price * $quantity;
                            $cart->shopcartitem_price = number_format($cart->shopcartitem_price, 2, '.', '');
                            $cart->discount_percentage = 0;
                        }
                        $cart->save();
                    }
                } else {
                    // If no cart item is found, create a new one
                    $cart = new shopcartitems();
                    $cart->user_id = auth()->user()->id;
                    $cart->customer_id = $customer->id;
                    $cart->product_id = $product_id;
                    $cart->quantity = $quantity;
                    if ($product->discount_percentage > 0) {
                        $cart->shopcartitem_price = $product_price - (($product_price * $product->discount_percentage) / 100);
                        $cart->shopcartitem_price = $product_price * $quantity;
                        $cart->shopcartitem_price = number_format($cart->shopcartitem_price, 2, '.', '');
                        $cart->discount_percentage = $product->discount_percentage;
                    } else {
                        $cart->shopcartitem_price = $product_price * $quantity;
                        $cart->shopcartitem_price = number_format($cart->shopcartitem_price, 2, '.', '');
                        $cart->discount_percentage = 0;
                    }
                    $cart->save();
                }
            }

            // dd($cart); // uncomment to debug
            return redirect()->back()->with('success', 'Product succesvol toegevoegd aan winkelwagen!');
        } catch (QueryException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),

            ]);

            return redirect('/503');
        } catch (ModelNotFoundException $e) {

            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        } catch (HttpException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/503');
        } catch (Exception $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        }
    }

    public function updateQuantity(Request $request, $id)
    {
        // $quantity = $request->input('quantity');

        // $cart = Shopcartitems::find($id);
        // $product = Products::find($cart->product_id);
        // if ($quantity > $product->stock || $quantity < 1) {
        //     return new Response(['error' => 'Product not found'], 406);

        //     // return redirect()->back()->with('error', 'Not enough stock!');
        // } else {
        //     $cart->quantity = $quantity;
        //     if ($product->discount_percentage > 0) {
        //         $cart->shopcartitem_price = ($product->selling_price - ($product->selling_price * $product->discount_percentage / 100)) * $quantity;
        //         $cart->save();
        //     } else {
        //         $cart->shopcartitem_price = $product->selling_price * $quantity;
        //         $cart->save();
        //     }

        //     //return redirect()->back();
        // }
        // return response()->json(['success' => true]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function destroy(shopcartitems $cart_item)
    {
        //$cart_item->delete();

        // return redirect()->back();
    }
}
