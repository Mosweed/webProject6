<x-header>
<section>
    <div class="row">
        <div class="mb-4 col-md-8">
            <div class="mb-4 card">
                <div class="py-3 card-header">
                    <h5 class="mb-0">Factureringsgegevens</h5>
                </div>
                <div class="card-body">
                    <form  action="/checkout/test" method="POST">
                        @csrf
                        @method('POST')

                        <div class="mb-4 row">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" name="first_name" class="form-control" placeholder="Voornaam"
                                        value="{{ auth()->user()->castomer->firstname }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" name="last_name" class="form-control" placeholder="Achternaam"
                                        value="{{ auth()->user()->castomer->lastname }}" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 form-outline">
                            <input type="text " name="country" class="form-control" placeholder="Land"
                                value="{{ auth()->user()->castomer->country }}" />
                        </div>
                        <div class="mb-4 form-outline">
                            <input type="text" name="address" class="form-control" placeholder="Straat en huisnummer"
                                value="{{ auth()->user()->castomer->address }}" />
                        </div>
                        <div class="mb-4 form-outline">
                            <input type="text" name="zip" class="form-control" placeholder="Postcode "
                                value="{{ auth()->user()->castomer->zipcode }}" />
                        </div>

                        <div class="mb-4 form-outline">
                            <input type="text" name="city" class="form-control" placeholder="Plaats "
                                value="{{ auth()->user()->castomer->city }}" />
                        </div>

                        <div class="mb-4 form-outline">
                            <input type="text" name="phone" class="form-control" placeholder="Telefoon "
                                value="{{ auth()->user()->castomer->phonenumber }}" />
                        </div>
                        <div class="mb-4 form-outline">
                            <input type="email" name="email" class="form-control" placeholder="E-mailadres"
                                value="{{ auth()->user()->email }}" />
                        </div>
                        <hr class="my-4" />

                        <button class="btn btn-primary btn-lg btn-block cartbutton primairy-button no-margin" type="submit">
                        Afrekenen
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="mb-4 col-md-4">
            <div class="mb-4 card">
                <div class="py-3 card-header">
                    <h5 class="mb-0">Subtotaal</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cartItems as $product)
                            <li
                                class="px-0 pb-0 border-0 list-group-item d-flex justify-content-between align-items-center">
                                {{ $product->name }} x {{ $product->quantity }}
                                <span> €{{ number_format($product->shopcartitem_price, 2, '.', ',') }}</span>
                                @php
                                    $total += $product->shopcartitem_price;

                                @endphp

                            </li>
                        @endforeach
                        <li class="px-0 list-group-item d-flex justify-content-between align-items-center">
                            Verzending
                            <span>Gratis</span>
                        </li>
                        <li
                            class="px-0 mb-3 border-0 list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Total </strong>
                                <strong>
                                    <p class="mb-0">(inclusief btw)</p>
                                </strong>
                            </div>
                            <span><strong> €{{ $total }}</strong></span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
</x-header>
