<x-admin>
    <style>
    </style>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="mb-5">Groothandel producten</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
                <h4>Contact gegevens</h4>
                <p>Directrice: Anne Kuin</p>
                <p><strong>Bestel telefoonnummer: 06-91204657</strong></p>
                <p>Adres: Kruiswaal 16 1161 AM Zwanenburg</p>
                <p>E-mailadres: AnneKuin@kuinshop.com, info@kuinshop.com</p>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <livewire:admin.groothandel.order.selectedproducts />

    {{-- <table class="table table-bordered">
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
                <a class="btn btn-info"  wire:click=''>Selecteer</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $products->links() }} --}}
    {{-- <script>
        var selectedProducts = [];

        function storeProduct(productId) {
            // Send an AJAX request to the server to get the detailed product information
            // You can use the productId to fetch the product details from the server
            // Once you have the details, you can add the product to the selectedProducts array
            if (!selectedProducts.includes(productId)) {
                selectedProducts.push(productId);
            } else {
                // alert('Product is al toegevoegd.');
            }


            console.log(selectedProducts);
            // Example AJAX request using jQuery
            $.ajax({
                url: '/get-selected-products',
                method: 'POST',
                data: {
                    selectedProducts: selectedProducts
                },
                success: function(response) {
                    // Update the view with the corresponding products
                    // You can use the response to update the table or any other elements on the page
                    console.log(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    </script> --}}
</x-admin>