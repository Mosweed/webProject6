<?php

namespace App\Http\Livewire\Admin\Groothandel\Order;

use App\Models\myorders;
use App\Models\myorders_items;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Selectedproducts extends Component
{
    // use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // Token
    public $token = '44|srnnu8Lvo78eg3ZEdPj5fa14gp6XtKZEfbcmlZ3U';

    public $selectedProducts = [];

    public $isOrderSent = false;

    public function render()
    {

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token,
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

        //$paginator->paginate(5);
        //     $this->selectedProducts = $this->getSelectedProductsProperty();

        //    // dd( $this->selectedProducts);
        //    Log::channel('errors')->error($this->selectedProducts);
        return view('livewire.admin.groothandel.order.selectedproducts', [
            'products' => $paginator,
            'selected_products' => $this->getSelectedProductsProperty(),
        ]);
    }

    public function selectProduct($id, $image, $title)
    {
        $this->isOrderSent = false;
        $this->selectedProducts[] = [
            'id' => $id,
            'image' => $image,
            'title' => $title,
            'qnty' => 1,
        ];

        // dd($this->selectedProducts);
    }

    // public function updateQuantity($productId, $quantity)
    // {
    //     foreach ($this->selectedProducts as &$product) {
    //         if ($product['id'] == $productId) {
    //             $product['qnty'] = $quantity;
    //             break;
    //         }
    //     }

    //     dd($this->selectedProducts);
    // }

    public function removeProduct($productId)
    {
        foreach ($this->selectedProducts as $index => $product) {
            if ($product['id'] == $productId) {
                unset($this->selectedProducts[$index]);
                $this->selectedProducts = array_values($this->selectedProducts);
                break;
            }
        }
    }

    public function getSelectedProductsProperty()
    {
        // dd($this->selectedProducts);
        return $this->selectedProducts;

    }

    public function submitOrder()
    {
        $this->isOrderSent = true;
        // dd($this->selectedProducts);
        $order_id = null;
        $index = 0;
        // dd($this->selectedProducts);
        //Create api call.
        foreach ($this->selectedProducts as $product) {
            $index++;
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$this->token,
            ])->post(
                'https://kuin.summaict.nl/api/orderItem',
                [
                    'order_id' => $order_id,
                    'product_id' => $product['id'],
                    'quantity' => $product['qnty'],

                ]
            );

            $response->json();
            // dd($response->json());
            if ($index == 1) {
                $order_id = $response['order_id'];
                myorders::create([
                    'Order_id' => $response['order_id'],
                    'Order_status' => 'pending',
                ]);

            }

            myorders_items::create([
                'Order_id' => $response['order_id'],
                'Product_id' => $product['id'],
                'Quantity' => $product['qnty'],
            ]);

        }
        $this->selectedProducts = [];

        //succes callback message to front-end.

    }
}
