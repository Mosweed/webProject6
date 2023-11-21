<x-admin>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Bewerk: {{ $product->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('index') }}"> Terug</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Er blijken wat fouten te zijn met de ingevulde waardes.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Naam:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Naam"
                        value="{{ $product->name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Omschrijving:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Omschrijving"> {{ $product->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <img height="250" src="{{ $product->image }}" width="250" id="image_preview_container">

                    <strong>Foto:</strong>
                    <input type="file" name="image" id="image">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>category:</strong>
                    <select class="form-control" name="categorie_id">
                        @foreach ($categories as $category)
                            <option @if ($category->id == $product->categorie_id) selected @endif value="{{ $category->id }}">
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prijs:</strong>
                    <input type="number" name="price" class="form-control" placeholder="Prijs"
                        value="{{ $product->price }}">
                </div>
            </div> --}}

            @if ($product->kuin_id != null)

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Leverancier:</strong>
                    <h1 class="form-control">
                        Kuin
                    </h1>
                </div>
            </div>
            @endif


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Verkoop Prijs:</strong>
                    <input type="number" name="selling_price" class="form-control" placeholder="Verkoop Prijs"
                        value="{{ $product->selling_price }}">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Inkoop Prijs:</strong>
                    <input type="number" name="purchase_price" class="form-control" placeholder="Inkoop Prijs"
                        value="{{ $product->purchase_price }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Korting %:</strong>
                    <input type="number" name="discount_percentage" class="form-control" placeholder="Korting %"
                        value="{{ $product->discount_percentage }}" max="100">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="form-control" name="status">
                        <option @if ($product->status == 1) selected @endif value="1">Puplish</option>
                        <option @if ($product->status == 0) selected @endif value="0">Unpuplish</option>

                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>barcode:</strong>
                    <input type="number" name="barcode" class="form-control" placeholder="barcode"
                        value="{{ $product->barcode }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Voorraad:</strong>
                    <input type="number" name="stock" class="form-control" placeholder="Voorraad"
                        value="{{ $product->stock }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hoogte in cm:</strong>
                    <input type="number" name="height_cm" class="form-control" placeholder="Hoogte in cm"
                        value="{{ $product->height_cm }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Breedte in cm:</strong>
                    <input type="number" name="width_cm" class="form-control" placeholder="Breedte in cm"
                        value="{{ $product->width_cm }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Diepte in cm:</strong>
                    <input type="number" name="depth_cm" class="form-control" placeholder="Diepte in cm"
                        value="{{ $product->depth_cm }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gewicht in gr:</strong>
                    <input type="number" name="weight_gr" class="form-control" placeholder="Gewicht in gr"
                        value="{{ $product->weight_gr }}">
                </div>
            </div>

            <div class="text-center col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </div>
        </div>

    </form>

    <script src="{{ asset('js/profileupdate.js') }}"></script>
</x-admin>
