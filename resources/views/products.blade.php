<x-header>
    <main>
        <div class="container-fluid">
            <div class="mt-3 mb-5 row">
                <div class="col-3">
                    <div class="filter-column">
                        <h3>Filters</h3>
                        <div class="filter-group">
                            <h4>Categorie</h4>
                            <ul>
                                @foreach ($categories as $category)
                                @php
                                $isSelected = (isset($data['categories']) && $category->id == $data['categories']);
                                $isDefaultSelected = (!isset($data['categories']) && $category->id == 1);
                                $selectedClass = ($isSelected || $isDefaultSelected) ? 'selected' : '';
                                @endphp
                                <li class="{{ trim($selectedClass) }}">
                                    <a href="#" onclick="event.preventDefault(); submitFilterForm({{ $category->id }}, null);">
                                        {{ $category->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="filter-group">
                            <h4>Merk</h4>
                            <ul>
                                <li><a href="#">Merk 1</a></li>
                                <li><a href="#">Merk 2</a></li>
                                <li><a href="#">Merk 3</a></li>
                            </ul>
                        </div>

                        <div class="filter-group">
                            <h4>Prijsbereik</h4>
                            <ul>
                                @php
                                $priceSelected = $data['price_range'] ?? '';

                                $selectedPriceClass1 = ($priceSelected == '0-25') ? 'selected' : '';
                                $selectedPriceClass2 = ($priceSelected == '25-50') ? 'selected' : '';
                                $selectedPriceClass3 = ($priceSelected == '50-100') ? 'selected' : '';
                                $selectedPriceClass4 = ($priceSelected == '100+') ? 'selected' : '';
                                @endphp

                                <li class="{{ trim($selectedPriceClass1) }}" data-price-range="0-25"><a href="#">Minder dan €25</a></li>
                                <li class="{{ trim($selectedPriceClass2) }}" data-price-range="25-50"><a href="#">€25 tot €50</a></li>
                                <li class="{{ trim($selectedPriceClass3) }}" data-price-range="50-100"><a href="#">€50 tot €100</a></li>
                                <li class="{{ trim($selectedPriceClass4) }}" data-price-range="100+"><a href="#">Meer dan €100</a></li>
                            </ul>
                        </div>
                        <form action="" method="get" name="Products" id="filterForm">
                            <input type="hidden" name="categories" value="{{ $data['categories'] ?? '' }}">
                            <input type="hidden" name="price_range" value="{{ $data['price_range'] ?? '' }}">
                        </form>

                        <button class="primairy-button" onclick="event.preventDefault(); clearFilters();">Filters resetten</button>

                        <script>
                            function clearFilters() {
                                const currentUrl = window.location.href;
                                const newUrl = currentUrl.split('?')[0]; // Remove everything after '?'

                                window.location.href = newUrl; // Refresh the page with the new URL
                            }

                            function submitFilterForm(categoryId, priceRange) {
                                const filterForm = document.getElementById('filterForm');
                                if (categoryId !== null) {
                                    filterForm.querySelector('input[name="categories"]').value = categoryId;
                                }

                                if (priceRange !== null) {
                                    filterForm.querySelector('input[name="price_range"]').value = priceRange;
                                }

                                filterForm.submit();
                            }

                            const priceRangeItems = document.querySelectorAll('[data-price-range]');
                            priceRangeItems.forEach(item => {
                                item.addEventListener('click', (event) => {
                                    event.preventDefault();
                                    const priceRange = event.currentTarget.dataset.priceRange;
                                    submitFilterForm(null, priceRange);
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row">
                        @if($products->isEmpty())
                        <p>Geen producten gevonden met deze zoek criteria.</p>
                        @else
                        @foreach($products as $product)
                        <div class="pt-4 col-md-3 col-sm-6 col-6">
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
                                            <img src="/images/check_circle_FILL0_wght400_GRAD0_opsz48.png">
                                        </div>
                                        <div class="product-card__delivery-text">
                                            Binnen 1-3 dagen bezorgd.
                                        </div>
                                    </div>
                                    <div class="product-card__price">
                                        <p @if ($product->discount_percentage != 0) style="text-decoration: line-through"
                                            @endif>
                                            € {{ $product->selling_price }}</p>
                                        @if ($product->discount_percentage != 0)
                                        <span class="sale-price">€ {{ $product->selling_price - ($product->selling_price * $product->discount_percentage) / 100 }}</span>
                                        @else
                                        @endif

                                    </div>

                                    <div class="product-card__stock">
                                        @if ($product->stock <= 0) <span class="out-of-stock">Uitverkocht</span>
                                            @else
                                            Nog {{ $product->stock }} op voorraad
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="mt-5 row">
                        <div class="col-md-12">
                            {{  $products->appends($data)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-header>
