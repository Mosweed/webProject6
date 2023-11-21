



    <section class="h-100 gradient-custom">
        {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif --}}
    <x-message />
        <div class="container py-5">
            <div class="my-4 row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="mb-4 card" @if ($cartitems->isEmpty()) style="width: 500px" @endif>
                        <div class="py-3 card-header">
                            <h5 class="mb-0 w-1000">Winkelwagen</h5>
                        </div>
                        <div class="card-body">
                            <!-- Single item -->

                            <div class="row ">
                                @if (!empty($cartitems))
                                    @foreach ($cartitems as $cartItem)
                                        <div class="mb-4 col-lg-3 col-md-12 mb-lg-0">
                                            <!-- Image -->
                                            <div class="rounded bg-image hover-overlay hover-zoom ripple cart-item-img"
                                                data-mdb-ripple-color="light">
                                                <img src="{{ $cartItem->image }}" class="w-100"
                                                    alt="Blue Jeans Jacket" />
                                                <a href="#!">
                                                    <div class="mask"
                                                        style="background-color: rgba(251, 251, 251, 0.2)">
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- Image -->
                                        </div>

                                        <div class="mb-4 col-lg-5 col-md-6 mb-lg-0">
                                            <!-- Data -->
                                            <p><strong>{{ $cartItem->name }}</strong></p>

                                            <p><strong>€ {{ $cartItem->selling_price }}</strong></p>

                                            <button type="submit" class="m-0 primairy-button" title="Remove item"
                                                wire:click="removeItem({{ $cartItem->id }})">
                                                <i class="bi bi-trash3"></i>
                                            </button>

                                        </div>

                                        <div class="mb-4 col-lg-4 col-md-6 mb-lg-0 position-relative">
                                            {{-- <form action="{{ route('shopcartitems.updateQuantity', $cartItem->id) }}" method="POST" name="itemquantity"> --}}
                                            {{-- <form  method="POST" name="itemquantity">
                                    @method('PUT')
                                    @csrf --}}
                                            <div class="mb-4 d-flex justify-content-end align-items-center"
                                                style="max-width: 300px">

                                                <button class="quantity-change"
                                                    wire:click="decrementQty({{ $cartItem->id }})">
                                                    <i class="bi bi-dash"></i>
                                                </button>

                                                <div class="form-outline">
                                                    {{-- <input id="quantity"  name="quantity" max="{{ $cartItem->stock }}" value="{{ $cartItem->quantity }}" type="number" class="form-control" onchange="itemquantity.submit()" /> --}}
                                                    <input id="quantity-{{ $cartItem->id }}" name="quantity"
                                                        max="{{ $cartItem->stock }}" value="{{ $cartItem->quantity }}"
                                                        type="number" class="form-control"
                                                        onchange="updateQuantity({{ $cartItem->id }})" />
                                                </div>

                                                <button class="quantity-change"
                                                    wire:click="incrementQty({{ $cartItem->id }})">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                            {{-- </form> --}}
                                            <!-- Price -->
                                            <p class="cart-item-price"
                                                @if ($cartItem->discount_percentage != 0) style="text-decoration: line-through" @endif>
                                                <strong>€ {{ $cartItem->selling_price * $cartItem->quantity }}</strong>
                                            </p>
                                            @if ($cartItem->discount_percentage != 0)


                                                <p class="text-start text-md-center sale-price">
                                                    <strong>
                                                        €
                                                        {{ number_format(($cartItem->selling_price - ($cartItem->selling_price * $cartItem->discount_percentage) / 100) * $cartItem->quantity, 2, '.', ',') }}</strong>
                                                </p>
                                            @endif

                                            <!-- Price -->
                                        </div>
                                        <div class="mb-5 col-12"></div>
                                    @endforeach
                                @endif

                            </div>
                            <!-- Single item -->

                        </div>
                    </div>
                    <div class="mb-4 card">
                        <div class="card-body">
                            @if (count($cartitems) > 0)
                            <p><strong>Verwachte levertijd</strong></p>
                            <p class="mb-0">{{ $expected_delivery_date }}</p>
                            @else
                            <a href="/producten/" class="primairy-button no-margin">Zie meer</a>
                            @endif


                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="mb-4 card">
                        <div class="py-3 card-header">
                            <h5 class="mb-0">Overzicht</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li
                                    class="px-0 pb-0 border-0 list-group-item d-flex justify-content-between align-items-center">
                                    Subtotaal
                                    <span>€ {{ $total  }}</span>
                                </li>
                                <li class="px-0 list-group-item d-flex justify-content-between align-items-center">
                                    Verzending
                                    <span>Gratis</span>
                                </li>
                                <li
                                    class="px-0 mb-3 border-0 list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>Totaal</strong>
                                        <strong>
                                            <p class="mb-0">(inclusief btw)</p>
                                        </strong>
                                    </div>
                                    <span><strong>€
                                            {{ $total}}</strong></span>
                                </li>
                            </ul>

                            <a @if (count($cartitems) == 0) style="pointer-events: none" @endif
                                class=" primairy-button" href="/checkout">
                                Rond bestelling af
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
