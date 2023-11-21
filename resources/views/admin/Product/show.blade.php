<x-admin>
<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('index') }}"> Terug</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="{{ asset($product->image) }}" class="img-fluid" alt="Product Image">
      </div>
      <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p> {{ $product->description }}</p>
        <ul>
          <li><strong>Category:</strong> {{ $product->category->name }}</li>
          <li><strong>Verkoop Prijs:</strong> € {{ $product->selling_price }}</li>
          <li><strong>Inkoop Prijs::</strong> € {{ $product->purchase_price }}</li>
          <li><strong>Korting %:</strong> {{ $product->discount_percentage }}</li>
          <li><strong>Voorraad:</strong> {{ $product->stock }}</li>
          <li><strong>Status:</strong> {{ $product->status }}</li>
          <li><strong>Barcode:</strong> {{ $product->barcode }}</li>
          <li><strong>Afmetingen (B x H x D):</strong> {{ $product->width_cm }} cm x {{ $product->height_cm }} cm x {{ $product->depth_cm }} cm</li>
          <li><strong>Gewicht:</strong> {{ $product->weight_gr }} kg</li>
        </ul>
        <a class="btn btn-primary" href="{{ route('edit', $product->id) }}">Bewerken</a></div>
    </div>
  </div>


</x-admin>

