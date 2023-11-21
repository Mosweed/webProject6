<?php

namespace App\Http\Livewire\Admin\Orderspagenas;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Livewire\Component;

class Ordersdetails extends Component
{
    public $order_user_info;

    public $order_products_info;

    public function mount(Request $request)
    {
        $this->order_user_info = Order::where('id', $request->id)->first();
        // dd($this->order_user_info);
        $this->order_products_info = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')->where('order_id', $request->id)->get();

    }

    public function render()
    {
        return view('livewire.admin.orderspagenas.ordersdetails')->layout('components.admin');
    }
}
