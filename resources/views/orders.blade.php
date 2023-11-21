<x-header>
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
                            <h6 class="mb-0 text-charcoal w-100">Bestelling Number</h6>
                            <p class="mb-0 mb-2 text-pebble w-100 mb-md-0">{{ $order->id }}</p>
                        </div>
                        <div class="col-6 col-md">
                            <h6 class="mb-0 text-charcoal w-100"> Datum</h6>
                            <p class="mb-0 mb-2 text-pebble w-100 mb-md-0">{{ $order->date }}</p>
                        </div>
                        <div class="col-6 col-md">
                            <h6 class="mb-0 text-charcoal w-100">Totaal</h6>
                            <p class="mb-0 mb-2 text-pebble w-100 mb-md-0">{{ $order->total }}</p>
                        </div>
                        <div class="col-6 col-md">
                            <h6 class="mb-0 text-charcoal w-100">Status</h6>
                            <p class="mb-0 mb-2 text-pebble w-100 mb-md-0">{{ $order->status }}</p>
                        </div>
                        <div class="col-12 col-md-3">
                            <a href="{{ route('orderdetails', $order)  }}" class="float-left primairy-button">Bekijk de bestelling</a>
                            <a href="{{ route('generate-pdf', $order)  }}" class="float-left primairy-button">Factuur</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>
</x-header>
