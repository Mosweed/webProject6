<x-admin>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Producten</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
                <a class="btn btn-success" href="{{ url('create') }}">Voeg een product toe</a>
            </div>


            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif



            <table class="table mb-0 table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Afbeelding</th>
                        <th>Title</th>
                        <th>Omschrijving</th>
                        <th>Status</th>
                        <th style="width: 150px">Verkoop prijs</th>
                        <th>Barcode</th>

                        <th width="280px">Actie</th>
                    </tr>
                </thead>

                @foreach ($products as $product)
                    <tr>
                        <td>{{ ++$i }}</td>


                        <td><img src=" {{ asset($product->image) }}" width="100px"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->status }}</td>
                        <td>€ {{ $product->selling_price }}</td>

                         <td> {!! DNS1D::getBarcodeHTML($product->barcode, 'EAN8', 2, 33, '#6A9758') !!}
                            <br>
                            {{ $product->barcode }}
                        </td>

                        <td>
                            <form action="{{ route('destroy', $product->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('show', $product->id) }}">Zie meer</a>

                                <a class="btn btn-primary" href="{{ route('edit', $product->id) }}">Bijwerken</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {{ $products->links() }}
        </div>
    </div>
</x-admin>
