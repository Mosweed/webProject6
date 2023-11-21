<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OrderController extends Controller
{
    public function index()
    {
        // Retrieve all OrderItems for the current user's open order
        try {
            $orders = Order::where('user_id', auth()->id())->get();
            foreach ($orders as $order) {
                $order->date = date('d-m-Y', strtotime($order->date));
            }

            return view('orders', compact('orders'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Order $Order)
    {
        try {
            $order_items = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')->where('order_id', $Order->id)->get();

            $Order->date = date('d-m-Y', strtotime($Order->date));
            $Order->expected_delivery_date = date('d-m-Y', strtotime($Order->expected_delivery_date));
            if ($Order->status == 'Afgeleverd') {
                $Order->delivery_date = date('d-m-Y', strtotime($Order->delivery_date));
            }

            return view('orderdetails', compact('order_items'), compact('Order'));
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
    }

    /**
     * Add product to order item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addProductToOrderItem(Request $request)
    {

    }

    public function updateQuantity(Request $request, $id)
    {
        // $orderItem = OrderItem::findOrFail($id);
        // $orderItem->quantity = $request->input('quantity');
        // $orderItem->save();

        // return response()->json(['success' => true]);
    }

    public function destroy(OrderItem $order_item)
    {
        // $order_item->delete();

        // return redirect()->back();
    }
}
