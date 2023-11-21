<x-admin>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/product') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Naam:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Naam">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Omschrijving:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Omschrijving"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <img height="250" width="250" id="image_preview_container">

                    <strong>Foto:</strong>
                    <input type="file" name="image" id="image">
                </div>
            </div>

            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <input type="file" name="image" class="form-control" placeholder="imFoTOage">
                </div>
            </div> --}}

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>category:</strong>
                    <select class="form-control" name="categorie_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Verkoop Prijs:</strong>
                    <input type="number" name="selling_price" class="form-control" placeholder="Verkoop Prijs"">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Inkoop Prijs:</strong>
                    <input type="number" name="purchase_price" class="form-control" placeholder="Inkoop Prijs">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Korting %:</strong>
                    <input type="number" name="discount_percentage" class="form-control" placeholder="Korting %" max="100">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="form-control" name="status">
                        <option  value="1">Puplish</option>
                        <option  value="0">Unpuplish</option>

                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>barcode:</strong>
                    <input type="number" name="barcode" class="form-control" placeholder="barcode" value="{{ $barcode  }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Voorraad:</strong>
                    <input type="number" name="stock" class="form-control" placeholder="Voorraad">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hoogte in cm:</strong>
                    <input type="number" name="height_cm" class="form-control" placeholder="Hoogte in cm">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Breedte in cm:</strong>
                    <input type="number" name="width_cm" class="form-control" placeholder="Breedte in cm">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Diepte in cm:</strong>
                    <input type="number" name="depth_cm" class="form-control" placeholder="Diepte in cm">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gewicht in gr:</strong>
                    <input type="number" name="weight_gr" class="form-control" placeholder="Gewicht in gr">
                </div>
            </div>

            <div class="text-center col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Opslaan</button>
            </div>
        </div>

    </form>

    <script src="{{ asset('js/profileupdate.js') }}"></script>
</x-admin>
