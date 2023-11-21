<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Order $Order)
    {

        $order_items = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')->where('order_id', $Order->id)->get();

        $Order->date = date('d-m-Y', strtotime($Order->date));
        $Order->expected_delivery_date = date('d-m-Y', strtotime($Order->expected_delivery_date));
        if ($Order->status == 'Afgeleverd') {
            $Order->delivery_date = date('d-m-Y', strtotime($Order->delivery_date));
        }
        $data = [
            'order_items' => $order_items,
            'Order' => $Order,
        ];

        $pdf = PDF::loadView('factuur', $data);

        return $pdf->stream('fuctuur'.$Order->id.'.pdf');
        // return $pdf->download('fuctuur'.$Order->id.'.pdf');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
