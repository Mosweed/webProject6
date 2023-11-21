<?php

namespace App\Http\Livewire;

use App\Models\Products;
use App\Models\shopcartitems;
use Carbon\Carbon;
use Livewire\Component;

class Shopcart extends Component
{
    public $cartitems;

    public $sub_total = 0;

    public $total = 0;

    public $tax = 0;

    public $expected_delivery_date;

    public function render()
    {
        $this->cartitems = ShopCartItems::join('users', 'users.id', '=', 'shopcartitems.user_id')
            ->join('products', 'products.id', '=', 'shopcartitems.product_id')
            ->where('users.id', auth()->id())
            ->select('shopcartitems.*', 'products.name', 'products.selling_price', 'products.discount_percentage', 'products.image', 'products.stock')
            ->get();
        $this->total = 0;
        $this->sub_total = 0;
        $this->tax = 0;

        foreach ($this->cartitems as $item) {
            $this->total += $item->shopcartitem_price;
        }
        // $this->total = $this->sub_total + $this->tax;
        $this->expected_delivery_date = Carbon::now()->addHour(1)->addDays(2)->format('Y-m-d');
        $this->expected_delivery_date = date('d-m-Y', strtotime($this->expected_delivery_date));

        return view('livewire.shopcart');
    }

    public function incrementQty($id)
    {

        $cart = ShopCartItems::whereId($id)->first();
        $product = Products::find($cart->product_id);
        if ($cart->quantity + 1 > $product->stock) {
            session()->flash('error', 'niet genoeg voorraad!');
        } else {
            $cart->quantity += 1;
            if ($product->discount_percentage > 0) {
                $cart->shopcartitem_price = ($product->selling_price - (($product->selling_price * $product->discount_percentage) / 100));
                $cart->shopcartitem_price = $product->selling_price * ($cart->quantity);
                $cart->shopcartitem_price = number_format($cart->shopcartitem_price, 2, '.', '');
                $cart->discount_percentage = 0;
                $cart->save();
            } else {
                $cart->shopcartitem_price = $product->selling_price * ($cart->quantity);
                $cart->shopcartitem_price = number_format($cart->shopcartitem_price, 2, '.', '');
                $cart->discount_percentage = 0;
                $cart->save();
            }

            session()->flash('success', 'Producthoeveelheid is bijgewerkt !!!');

        }

    }

    public function decrementQty($id)
    {

        $cart = ShopCartItems::whereId($id)->first();
        $product = Products::find($cart->product_id);
        if ($cart->quantity == 1) {
            //session()->flash('info', 'You cannot have less than 1 quantity');
            session()->flash('error', 'U kunt niet minder dan 1 hoeveelheid hebben!');
        } else {
            $cart->quantity -= 1;
            if ($product->discount_percentage > 0) {
                $cart->shopcartitem_price = ($product->selling_price - (($product->selling_price * $product->discount_percentage) / 100));
                $cart->shopcartitem_price = $product->selling_price * ($cart->quantity);
                $cart->shopcartitem_price = number_format($cart->shopcartitem_price, 2, '.', '');
                $cart->discount_percentage = $product->discount_percentage;
                $cart->save();
            } else {
                $cart->shopcartitem_price = $product->selling_price * ($cart->quantity);
                $cart->shopcartitem_price = number_format($cart->shopcartitem_price, 2, '.', '');
                $cart->discount_percentage = 0;
                $cart->save();
            }

            session()->flash('success', 'Producthoeveelheid is bijgewerkt !!!');

        }

    }

    public function removeItem($id)
    {
        $cart = ShopCartItems::whereId($id)->first();

        if ($cart) {
            $cart->delete();
            $this->emit('updateCartCount');
        }
        session()->flash('success', 'Product verwijderd uit winkelwagen !!!');
    }
}
