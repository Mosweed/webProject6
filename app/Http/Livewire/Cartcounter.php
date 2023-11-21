<?php

namespace App\Http\Livewire;

use App\Models\shopcartitems;
use Livewire\Component;

class Cartcounter extends Component
{
    public $total = 0;

    protected $listeners = ['updateCartCount' => 'getCartItemCount'];

    public function render()
    {
        $this->getCartItemCount();

        return view('livewire.cartcounter');
    }

    public function getCartItemCount()
    {
        $this->total = shopcartitems::whereUserId(auth()->user()->id)->count();
    }
}
