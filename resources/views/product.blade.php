<x-header>
    <x-message />

    <section>
        <div class="container">
            <div class="pb-5 row">
                <div class="col-lg-12 margin-tb">

                    <div class="pull-right">
                        <a class="primairy-button no-margin" href="{{ route('customerHome') }}">Terug</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset($pro->image) }}" class="img-fluid" alt="Product Image">
                </div>
                <div class="col-md-6">
                    <h1>{{ $pro->name }}</h1>
                    <p> {{ $pro->description }}</p>
                    <ul>
                        <li><strong>Category:</strong> {{ $pro->category->name }}</li>
                        <li><strong>Verkoop Prijs:</strong>
                            <strong @if ($pro->discount_percentage != 0) style="text-decoration: line-through"
                                @else @endif>
                                € {{ $pro->selling_price }}</strong>
                            @if ($pro->discount_percentage != 0)
                            <strong class="sale-price">€
                                {{ $pro->selling_price - ($pro->selling_price * $pro->discount_percentage) / 100 }}</strong>
                            @else
                            @endif
                        </li>
                        <li><strong>Korting %:</strong> {{ $pro->discount_percentage }}</li>
                        <li><strong>Voorraad:</strong>
                            @if ($pro->stock <= 0) <span class="out-of-stock">Uitverkocht</span>
                                @else
                                Nog {{ $pro->stock }} op voorraad
                                @endif
                        </li>
                        <li><strong>Barcode:</strong> {{ $pro->barcode }}</li>
                        <li><strong>Afmetingen (B x H x D):</strong> {{ $pro->width_cm }} cm x {{ $pro->height_cm }} cm x
                            {{ $pro->depth_cm }} cm
                        </li>
                        <li><strong>Gewicht:</strong> {{ $pro->weight_gr }} kg</li>
                        <form action="/cart/add-item" method="POST">
                            @csrf
                            <p>
                                <label for="quantity">Hoeveelheid:</label><br>
                                <input name="quantity" class="product-quantity" type="number" min="1" value="1" max="{{ $pro->stock }}">
                            </p>
                            <input hidden="true" name="product_id" value="{{ $pro->id }}">
                            <input class="add-to-cart" type="submit" value="Toevoegen aan winkelwagen" />
                            <p>Bestel: 06-33024999</p>
                        </form>
                </div>
                <div class="card-group">
                    @foreach ($products as $product)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset($product->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <a href="/product/{{ $product->id }}" class="add-to-cart">Bekijken</a>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
    </section>
</x-header>
