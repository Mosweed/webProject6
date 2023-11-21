<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class GroothandelController extends Controller
{
    public function index()
    {
        $token = '44|srnnu8Lvo78eg3ZEdPj5fa14gp6XtKZEfbcmlZ3U';
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->get('http://kuin.summaict.nl/api/product');

        $products = collect($response->json());
        $perPage = 20;
        $currentPage = request()->query('page', 1);
        $pagedProducts = $products->slice(($currentPage - 1) * $perPage, $perPage);
        $total = $products->count();

        $paginator = new LengthAwarePaginator(
            $pagedProducts,
            $total,
            $perPage,
            $currentPage,
            ['path' => url()->current()]
        );

        return view('admin.Groothandel.groothandel', ['products' => $paginator])
            ->with('i', ($currentPage - 1) * $perPage);
    }

    public function orders()
    {
        $token = '44|srnnu8Lvo78eg3ZEdPj5fa14gp6XtKZEfbcmlZ3U';
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->get('http://kuin.summaict.nl/api/order');

        $orders = collect($response->json())->reverse();
        $perPage = 20;
        $currentPage = request()->query('page', 1);
        $pagedOrders = $orders->slice(($currentPage - 1) * $perPage, $perPage);
        $total = $orders->count();

        $paginator = new LengthAwarePaginator(
            $pagedOrders,
            $total,
            $perPage,
            $currentPage,
            ['path' => url()->current()]
        );
        // dd($orders);
        return view('admin.Groothandel.orders', ['orders' => $paginator])
            ->with('i', ($currentPage - 1) * $perPage);
    }

    public function show($id)
    {
        $token = '44|srnnu8Lvo78eg3ZEdPj5fa14gp6XtKZEfbcmlZ3U';
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->get('https://kuin.summaict.nl/api/product/'.$id.'/');

        $product = collect($response->json());

        return view('admin.Groothandel.show', compact('product'));
    }
}
