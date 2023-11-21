<x-admin>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $product['name'] }}</h2>


            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/groothandel/"> Terug</a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="{{ $product['image'] }}" class="img-fluid" alt="Product Image">
          </div>
          <div class="col-md-6">
            <h1>  {{ $product['name'] }}</h1>
            <p> {{ $product['description'] }}</p>
            <ul>
              <li><strong> Prijs:</strong> €{{ $product['price'] }}</li>
              <li><strong>Afmetingen (B x H x D):</strong> {{ $product['price'] }} cm x {{ $product['height_cm'] }} cm x {{  $product['depth_cm'] }} cm</li>
              <li><strong>Gewicht:</strong> {{ $product['weight_gr'] }} kg</li>
            </ul>
        </div>
      </div>


    {{-- <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $product['name'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Omschrijving:</strong>
                {{ $product['description'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Afbeelding:</strong>
                <img src="{{ $product['image'] }}" width="500px">
            </div>
        </div>
    </div> --}}
</x-admin>
