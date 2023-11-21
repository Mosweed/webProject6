<x-admin>
    <x-message />
<div class="container mt-3 mt-md-5">

    <div class="mb-4 card w-100">
        <div class="py-3 card-header">
            <h5 class="mb-0">Bestellingen</h5>
        </div>
        <div class="col-12">
            <div class="mb-5 list-group">
                @foreach ($orders as $order)
                <div class="p-3 list-group-item bg-snow" style="position: relative;">
                    <div class="row w-100 no-gutters">
                        <div class="col-6 col-md">
                            <h6 class="mb-0 text-charcoal w-100">Bestelling Nummer</h6>
                            <p class="mb-0 mb-2 text-pebble w-100 mb-md-0">#{{ $order->id }}</p>
                        </div>

                        <div class="col-3 col-md">
                            <h6 class="mb-0 text-charcoal w-100">Status</h6>
                            <p class="mb-0 mb-2 text-pebble w-100 mb-md-0">{{ $order->status }}</p>
                        </div>
                         <div class="col-3 col-md">
                            <h6 class="mb-0 text-charcoal w-100">geïmporteerde producten</h6>
                            <p class="mb-0 mb-2 text-pebble w-100 mb-md-0"><b> {{ $order->orderItems->where('imported', 1)->count() }} / {{ $order->orderItems->count() }}</b></p>
                        </div>
                        <div class="col-12 col-md-3">
                            <a href="{{ route('myorders.show', $order->Order_id)  }}" class="float-left p-2 text-decoration-none btn-info">Bekijk de bestelling</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
</x-admin>
