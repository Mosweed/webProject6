<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\myorders;
use App\Models\myorders_items;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MyordersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = myorders::query()
            ->where('status', 'Wachten')
            ->where('Order_status', 'completed')
            ->get();

        $orders->each(function ($order) {
            $orderItems = myorders_items::where('Order_id', $order->Order_id)->get();
            $order->orderItems = $orderItems;
        });

        // dd($orders);
        return view('admin/Groothandel/myorders', compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderItems = myorders_items::Where('order_id', $id)->get();
        // get categories where id != 1
        $categories = categorie::where('id', '!=', 1)->get();

        // dd($categories);

        return view('admin/Groothandel/myorder', [
            'orderItems' => $orderItems,
            'categories' => $categories,
        ]);
    }

    public function import(Request $request)
    {
        // dd($request->all());
        $orderItemId = $request->input('id', 0); // Default value is 0 if 'id' is not present
        $categoryId = $request->input('category') ?? '1'; // Default value is 1 if 'category' is null

        // dd($orderItemId, $categoryId);
        function ProductEan8bumNum()
        {
            // $ean8 = preg_replace('/\D/', '', $ean8);

            $prefix = '87';

            $ean8 = $prefix.mt_rand(10000, 99999);

            $digits = str_split($ean8);

            $odd = 0;
            $even = 0;
            $sum = 0;

            for ($i = count($digits) - 1; $i >= 0; $i--) {

                if ($i % 2 == 0) {
                    $odd += $digits[$i];
                } else {
                    $even += $digits[$i];
                }
            }
            $sum = $odd * 3 + $even * 1;
            $checksum = $ean8.(10 - ($sum % 10)) % 10;

            return $checksum;
        }

        $outboundProduct = myorders_items::Where('id', $orderItemId)->first();
        // Check if the outbound product already exists in the products table
        $product = Products::Where('kuin_id', $outboundProduct->Product_id)->first();
        if ($product) {
            // Product already exists, update the quantity
            $newQuantity = $product->stock + $outboundProduct->Quantity;
            $product
                ->update(['stock' => $newQuantity]);
        } else {
            // Product does not exist, insert it as a new product

            //API call to get product details.
            $token = '44|srnnu8Lvo78eg3ZEdPj5fa14gp6XtKZEfbcmlZ3U';
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$token,
            ])->get('https://kuin.summaict.nl/api/product/'.$outboundProduct->Product_id.'/');

            $outboundProductAPI = collect($response->json());

            $newProduct = [
                'name' => $outboundProductAPI['name'],
                'description' => $outboundProductAPI['description'],
                'selling_price' => $outboundProductAPI['price'] * 2.5,
                'purchase_price' => $outboundProductAPI['price'],
                'status' => 'published',
                'barcode' => ProductEan8bumNum(),
                'stock' => $outboundProduct->Quantity,
                'image' => $outboundProductAPI['image'],
                'height_cm' => $outboundProductAPI['height_cm'],
                'width_cm' => $outboundProductAPI['height_cm'],
                'depth_cm' => $outboundProductAPI['height_cm'],
                'weight_gr' => $outboundProductAPI['height_cm'],
                'categorie_id' => $categoryId,
                'kuin_id' => $outboundProduct->Product_id,
            ];

            $test = Products::Insert($newProduct);
            // dd($test);
        }

        // Mark the outbound product as imported
        $test = myorders_items::Where('id', $orderItemId)
            ->update(['imported' => 1]);
        // dd($test);

        $order = myorders::Where('Order_id', $outboundProduct->Order_id)->update(['status' => 'Afgeleverd']);

        return redirect()->back();
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
