<?php

namespace App\Http\Livewire\Admin\Groothandel;

use App\Models\myorders;
use Livewire\Component;

class Myordercounter extends Component
{
    public $total = 0;

    protected $listeners = ['updateMyordertCount' => 'getMyorderCount'];

    public function render()
    {
        $this->getMyorderCount();

        return view('livewire.admin.groothandel.myordercounter');
    }

    public function getMyorderCount()
    {
        $myorder = myorders::query();
        $myorder->where('status', 'Wachten');
        $myorder->where('Order_status', 'completed');
        $this->total = $myorder->count();

    }
}
