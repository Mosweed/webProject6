<x-header>

<secton class="mt-5 mb-5">
    <div class="container-fluid">
        <div class="hero">
            <div class="container-md">
                <div class="row">
                    <div class="col-6">
                        <div class="hero-content">
                            <h1>Wij zijn binnekort beschikbaar</h1>
                            <p>Tot dan: blader door onze diverse producten en/of bezoek een van onze <span
                                    class="green">Groene</span> vestigingen in Nederland.</p>
                            <a href="/producten/" class="primairy-button no-margin">Zie meer</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="hero-image">
                            <img src="images/hero.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</secton>
<section class="product-section">
    <div class="ellipse"></div>
    <div class="container-md">
        <div class="pt-5 mt-3 row">
            <div class="col-12">
                <h2>
                    Shop onze diverse <span class="white">producten</span>
                </h2>
            </div>
        </div>
        <div>
            <form action="" method="get" name="Categories">

                <select name="categories" id="categories" class="dropdown" onchange="Categories.submit()">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (isset($data['categories']) && $category->id == $data['categories']) selected @endif
                            @if (!isset($data['categories']) && $category->id == 1) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="mt-5 row justify-content-start">
            @foreach ($products as $product)
                <div class="pt-4 col-md-3 col-sm-4 col-6">
                    <div class="product-card">
                        <a href="/product/{{ $product->id }}" class="product-card__image">
                            <img src="{{ $product->image }}">
                        </a>
                        <div class="product-card__content">
                            <div class="product-card__title">
                                {{ $product->name }}
                            </div>
                            <div class="product-card__delivery">
                                <div class="product-card__delivery-icon">
                                    <img src="images/check_circle_FILL0_wght400_GRAD0_opsz48.png">
                                </div>
                                <div class="product-card__delivery-text">
                                    Binnen 1-3 dagen bezorgd.
                                </div>
                            </div>
                            <div class="product-card__price">
                                <p
                                    @if ($product->discount_percentage != 0) style="text-decoration: line-through"
                                 @endif>
                                    € {{ $product->selling_price }}</p>
                                @if ($product->discount_percentage != 0)
                                    <span
                                        class="sale-price">€ {{ $product->selling_price - ($product->selling_price * $product->discount_percentage) / 100 }}</span>
                                @else
                                @endif

                            </div>
                            <div class="product-card__stock">
                                @if ($product->stock <= 0)
                                    <span class="out-of-stock">Uitverkocht</span>
                                @else
                                    Nog {{ $product->stock }} op voorraad
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4 row">
            <div class="pt-4 col-12">
                {{ $products->appends($data)->links() }}
                <a href="#" class="btn btn-green">
                    Bekijk alles
                </a>
            </div>
        </div>
    </div>


</section>
<section>
    <div class="container-md">
        <div class="pt-4 mt-5 row">
            <div class="col-12">
                <h2>
                    Bezoek onze <span class="green">green</span> vestigingen
                </h2>
            </div>
        </div>
        <div class="mt-5 row">
            <div class="p-4 col-12">
                <div class="branch-card">
                    <div class="branch-card__content">
                        <div class="branch-card__row">
                            <div class="branch-card__icon">
                                <img src="images/contact_mail_FILL0_wght400_GRAD0_opsz48.svg">
                            </div>
                            <div class="branch-card__text">
                                <strong>Raj Hogewoning</strong>
                            </div>
                        </div>
                        <div class="branch-card__row">
                            <div class="branch-card__icon">
                                <img src="images/mail_FILL0_wght400_GRAD0_opsz48.svg">
                            </div>
                            <div class="branch-card__text">
                                RajHogewoning@groenevingersshop.com <br>
                                info@groenevingersshop.com
                            </div>
                        </div>
                        <div class="branch-card__row">
                            <div class="branch-card__icon">
                                <img src="images/call_FILL0_wght400_GRAD0_opsz48.svg">
                            </div>
                            <div class="branch-card__text">
                                06-33024999
                            </div>
                        </div>
                        <div class="branch-card__row">
                            <div class="branch-card__icon">
                                <img src="images/location_on_FILL0_wght400_GRAD0_opsz48.svg">
                            </div>
                            <div class="branch-card__text">
                                Tuinstraat 167 2587 WD Nuenen
                            </div>
                        </div>
                    </div>
                    <div class="branch-card__image">
                        <img src="images/locatie-nuenen.png">
                    </div>
                </div>
            </div>
            <div class="p-4 col-12">
                <div class="branch-card">
                    <div class="branch-card__content">
                        <div class="branch-card__row">
                            <div class="branch-card__icon">
                                <img src="images/contact_mail_FILL0_wght400_GRAD0_opsz48.svg">
                            </div>
                            <div class="branch-card__text">
                                <strong>Anne Kuin</strong>
                            </div>
                        </div>
                        <div class="branch-card__row">
                            <div class="branch-card__icon">
                                <img src="images/mail_FILL0_wght400_GRAD0_opsz48.svg">
                            </div>
                            <div class="branch-card__text">
                                AnneKuin@kuinshop.com, <br>
                                info@kuinshop.com
                            </div>
                        </div>
                        <div class="branch-card__row">
                            <div class="branch-card__icon">
                                <img src="images/call_FILL0_wght400_GRAD0_opsz48.svg">
                            </div>
                            <div class="branch-card__text">
                                06-91204657
                            </div>
                        </div>
                        <div class="branch-card__row">
                            <div class="branch-card__icon">
                                <img src="images/location_on_FILL0_wght400_GRAD0_opsz48.svg">
                            </div>
                            <div class="branch-card__text">
                                Kruiswaal 16 1161 AM Zwanenburg
                            </div>
                        </div>
                    </div>
                    <div class="branch-card__image">
                        <img src="images/locatie-nuenen.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</x-header>
