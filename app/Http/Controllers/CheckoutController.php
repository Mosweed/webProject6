<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products;
use App\Models\shopcartitems;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $shopCartItems = shopcartitems::join('users', 'users.id', '=', 'shopcartitems.user_id')
                ->join('products', 'products.id', '=', 'shopcartitems.product_id')
                ->where('users.id', auth()->id())
                ->select('shopcartitems.*', 'products.name', 'products.selling_price', 'products.discount_percentage', 'products.image', 'products.stock')
                ->get();
            // foreach ($shopCartItems as $shopCartItem) {
            //     $product = Products::find($shopCartItem->product_id);
            //     if ($product->stock < $shopCartItem->quantity && $shopCartItem->quantity > 0) {
            //         if ($shopCartItem->quantity > 0) {
            //             $shopCartItem->quantity = 1;
            //             $shopCartItem->save();
            //             return redirect()->route('cart.index')->with('error', 'Not enough stock!');
            //         } else {
            //             $shopCartItem->quantity = $product->stock;
            //             $shopCartItem->save();
            //             return redirect()->route('cart.index')->with('error', 'Not enough stock!');
            //         }
            //     }
            //     else {
            //         $shopCartItem->quantity = $shopCartItem->quantity;
            //         $shopCartItem->save();
            return view('checkout', [
                'cartItems' => $shopCartItems,
            ]);
        } catch (QueryException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'class' => get_class($e),

            ]);

            return redirect('/503');
        } catch (ModelNotFoundException $e) {

            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        } catch (HttpException $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'class' => get_class($e),
            ]);

            return redirect('/503');
        } catch (Exception $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        }
        //     }

        // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'email' => 'required',
        ]);

        try {
            $shopCartItems = shopcartitems::join('users', 'users.id', '=', 'shopcartitems.user_id')
                ->join('products', 'products.id', '=', 'shopcartitems.product_id')
                ->where('users.id', auth()->id())
                ->select('shopcartitems.*', 'products.name', 'products.selling_price', 'products.discount_percentage', 'products.image', 'products.stock')
                ->get();

            //    dd($shopCartItems);
            $totale = 0;
            foreach ($shopCartItems as $shopCartItem) {
                $totale += $shopCartItem->shopcartitem_price;
            }
            $totale = number_format($totale, 2, '.', '');
            $order = new Order();
            $order->user_id = auth()->id();
            $order->castomer_id = auth()->user()->castomer->id;
            $order->first_name = $request->input('first_name');
            $order->last_name = $request->input('last_name');
            $order->address = $request->input('address');
            $order->city = $request->input('city');
            $order->zip = $request->input('zip');
            $order->phone = $request->input('phone');
            $order->country = $request->input('country');
            $order->total = $totale;
            $order->email = $request->input('email');
            $order->date = $date = Carbon::now()->addHour(1)->format('Y-m-d');
            $order->expected_delivery_date = Carbon::now()->addHour(1)->addDays(2)->format('Y-m-d');
            $order->save();

            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey('test_8GDEQEHkUTnmdmTVjvhEtMbF85CTqc');

            $payment = $mollie->payments->create([
                'amount' => [
                    'currency' => 'EUR',
                    'value' => $totale,
                ],
                'description' => 'My first API payment',
                'redirectUrl' => 'http://localhost:8001/checkout/check',
                'metadata' => [
                    'order_id' => $order->id,
                ],

            ]);

            $paymentId = $payment->id;
            $p = $mollie->payments->update($paymentId, [
                'description' => 'My first API payment',
                'redirectUrl' => 'http://localhost:8001/checkout/check/'.$paymentId,
            ]);

            redirect($payment->getCheckoutUrl(), 303)->send();

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
        } catch (\Exception $e) {
            Log::channel('errors')->error($e->getCode(), [
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'class' => get_class($e),
            ]);

            return redirect('/500');
        }

    }

    public function check($id)
    {

        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey('test_8GDEQEHkUTnmdmTVjvhEtMbF85CTqc');

        $payment = $mollie->payments->get($id);
        // dd($payment -> metadata->order_id , $payment -> status);
        // if(!$id == null){
        //     $payment = $mollie->payments->get($id);
        //     dd($payment );
        // }

        switch ($payment->status) {
            case 'paid':

                $shopCartItems = shopcartitems::join('users', 'users.id', '=', 'shopcartitems.user_id')
                    ->join('products', 'products.id', '=', 'shopcartitems.product_id')
                    ->where('users.id', auth()->id())
                    ->select('shopcartitems.*', 'products.name', 'products.selling_price', 'products.discount_percentage', 'products.image', 'products.stock')
                    ->get();

                $order = Order::whereId($payment->metadata->order_id)->first();

                $order->status = 'Betaald';
                $order->save();
                foreach ($shopCartItems as $shopCartItem) {
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $payment->metadata->order_id;
                    $orderItem->product_id = $shopCartItem->product_id;
                    $orderItem->quantity = $shopCartItem->quantity;
                    $orderItem->price = $shopCartItem->shopcartitem_price;
                    $orderItem->discount_percentage = $shopCartItem->discount_percentage;
                    $orderItem->save();

                    $product = Products::where('id', $shopCartItem->product_id)->first();
                    $product->stock = $product->stock - $shopCartItem->quantity;
                    $product->save();
                    $shopCartItem->delete();
                }

                return redirect()->route('successful');
                break;
            case 'canceled':
                $order = Order::whereId($payment->metadata->order_id)->first();
                $order->delete();

                return redirect()->route('cart.index')->with('error', 'Bestelling is geannuleerd!');
                break;
            case 'failed':

                $order = Order::whereId($payment->metadata->order_id)->first();
                $order->delete();

                return redirect()->route('cart.index')->with('error', 'Bestelling is mislukt!');
                break;

            default:
                return redirect()->route('cart.index')->with('error', 'Bestelling is mislukt!');
                break;

        }

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
    public function destroy($id)
    {
        //
    }
}
