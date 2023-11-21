<div class="mt-5">
    <h3>Geselecteerde producten:</h3>
    <table style="background-color: #e3e3e3;" class=" table">
        <tr>
            <th>Id</th>
            <th>Afbeelding</th>
            <th>Title</th>
            <th>Hoeveelheid</th>
            <th width="280px">Actie</th>
        </tr>
        @foreach ($selected_products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td><img src=" {{ $product['image'] }}" width="100px"></td>
                <td>{{ $product['title'] }}</td>
                <td> <input min="1" type="number" wire:model="selectedProducts.{{ $loop->index }}.qnty">
                </td>
                <td>
                    <a class="btn btn-danger" wire:click='removeProduct({{ $product['id'] }})'>Verwijder</a>
                </td>
            </tr>
        @endforeach
        <tr>
            @if ($isOrderSent)
                <td>
                    <div class="alert alert-success">
                        Bestelling geplaatst.
                    </div>
                </td>
            @endif
            <td>
                @if (count($selected_products) > 0)
                    <button wire:click="submitOrder" class="btn btn-info">Bestel</button>
                @endif
            </td>
        </tr>
    </table>


    <h3 class="mt-3">Beschikbare producten:</h3>
    <table class="table table-bordered">

        <tr>
            <th>Id</th>
            <th>Afbeelding</th>
            <th>Title</th>
            <th>Omschrijving</th>
            <th width="280px">Actie</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td><img src=" {{ $product['image'] }}" width="100px"></td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['description'] }}</td>
                <td>
                    <a class="btn btn-info" href="/groothandel/{{ $product['id'] }}">Zie meer</a>
                    <a class="btn btn-info" <a class="btn btn-info"
                        wire:click='selectProduct({{ $product['id'] }}, {{ json_encode($product['image']) }}, {{ json_encode($product['name']) }})'>Selecteer</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $products->links() }}
    <!-- Livewire component's blade view -->
    <script>
        // Listen for the 'order-sent' event
        document.addEventListener('livewire:load', function() {
            Livewire.on('order-sent', function(data) {
                // Display the success message
                alert(data.message);
            });
        });
    </script>

</div>
