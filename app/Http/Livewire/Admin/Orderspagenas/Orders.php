<?php

namespace App\Http\Livewire\Admin\Orderspagenas;

use App\Models\Order;
use App\View\Components\message;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $searchTerm = null;

    public $status = null;

    protected $queryString = ['searchTerm' => ['except' => ''], 'status' => ['except' => '']];

    public $sortColumnName = 'id';

    public $sortDirection = 'asc';

    public function sortBy($columnName)
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function changeonstatus()
    {
        $this->resetPage();
    }

    public function changeOrderstatus(Order $order, $status)
    {

        $order->update(['status' => $status]);
        // $this->resetPage()->emit('updated', ['message' => "status changed to {$status} successfully."]);
        session()->flash('success', 'status succesvol gewijzigd in {$status}.');
    }

    public function render()
    {

        $orders = Order::query();

        if ($this->status != null) {
            if ($this->status != 'Alle') {
                if ($this->searchTerm != null) {

                    $orders->Where('total', 'like', '%'.$this->searchTerm.'%', 'or', 'id', 'like', '%'.$this->searchTerm.'%', 'or', 'date', 'like', '%'.$this->searchTerm.'%')->where('status', $this->status);

                } else {
                    $orders = $orders->where('status', $this->status);
                }
            } else {
                if ($this->searchTerm != null) {
                    $orders->Where('total', 'like', '%'.$this->searchTerm.'%', 'or', 'id', 'like', '%'.$this->searchTerm.'%', 'or', 'date', 'like', '%'.$this->searchTerm.'%');
                } else {

                }

            }
        } else {
            if ($this->searchTerm != null) {
                $orders->Where('total', 'like', '%'.$this->searchTerm.'%', 'or', 'id', 'like', '%'.$this->searchTerm.'%', 'or', 'date', 'like', '%'.$this->searchTerm.'%');
            }
        }

        $orders = $orders->orderBy($this->sortColumnName, $this->sortDirection);
        $orders = $orders->paginate(5);

        return view('livewire.admin.orderspagenas.orders',
            [
                'orders' => $orders,
            ])->layout('components.admin');
    }
}
