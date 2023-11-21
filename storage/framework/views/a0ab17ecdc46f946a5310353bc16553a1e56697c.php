<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <main>
        <div class="container-fluid">
            <div class="mt-3 mb-5 row">
                <div class="col-3">
                    <div class="filter-column">
                        <h3>Filters</h3>
                        <div class="filter-group">
                            <h4>Categorie</h4>
                            <ul>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $isSelected = (isset($data['categories']) && $category->id == $data['categories']);
                                $isDefaultSelected = (!isset($data['categories']) && $category->id == 1);
                                $selectedClass = ($isSelected || $isDefaultSelected) ? 'selected' : '';
                                ?>
                                <li class="<?php echo e(trim($selectedClass)); ?>">
                                    <a href="#" onclick="event.preventDefault(); submitFilterForm(<?php echo e($category->id); ?>, null);">
                                        <?php echo e($category->name); ?>

                                    </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <?php
                                $priceSelected = $data['price_range'] ?? '';

                                $selectedPriceClass1 = ($priceSelected == '0-25') ? 'selected' : '';
                                $selectedPriceClass2 = ($priceSelected == '25-50') ? 'selected' : '';
                                $selectedPriceClass3 = ($priceSelected == '50-100') ? 'selected' : '';
                                $selectedPriceClass4 = ($priceSelected == '100+') ? 'selected' : '';
                                ?>

                                <li class="<?php echo e(trim($selectedPriceClass1)); ?>" data-price-range="0-25"><a href="#">Minder dan €25</a></li>
                                <li class="<?php echo e(trim($selectedPriceClass2)); ?>" data-price-range="25-50"><a href="#">€25 tot €50</a></li>
                                <li class="<?php echo e(trim($selectedPriceClass3)); ?>" data-price-range="50-100"><a href="#">€50 tot €100</a></li>
                                <li class="<?php echo e(trim($selectedPriceClass4)); ?>" data-price-range="100+"><a href="#">Meer dan €100</a></li>
                            </ul>
                        </div>
                        <form action="" method="get" name="Products" id="filterForm">
                            <input type="hidden" name="categories" value="<?php echo e($data['categories'] ?? ''); ?>">
                            <input type="hidden" name="price_range" value="<?php echo e($data['price_range'] ?? ''); ?>">
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
                        <?php if($products->isEmpty()): ?>
                        <p>Geen producten gevonden met deze zoek criteria.</p>
                        <?php else: ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="pt-4 col-md-3 col-sm-6 col-6">
                            <div class="product-card">
                                <a href="/product/<?php echo e($product->id); ?>" class="product-card__image">
                                    <img src="<?php echo e($product->image); ?>">
                                </a>
                                <div class="product-card__content">
                                    <div class="product-card__title">
                                        <?php echo e($product->name); ?>

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
                                        <p <?php if($product->discount_percentage != 0): ?> style="text-decoration: line-through"
                                            <?php endif; ?>>
                                            € <?php echo e($product->selling_price); ?></p>
                                        <?php if($product->discount_percentage != 0): ?>
                                        <span class="sale-price">€ <?php echo e($product->selling_price - ($product->selling_price * $product->discount_percentage) / 100); ?></span>
                                        <?php else: ?>
                                        <?php endif; ?>

                                    </div>

                                    <div class="product-card__stock">
                                        <?php if($product->stock <= 0): ?> <span class="out-of-stock">Uitverkocht</span>
                                            <?php else: ?>
                                            Nog <?php echo e($product->stock); ?> op voorraad
                                            <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="mt-5 row">
                        <div class="col-md-12">
                            <?php echo e($products->appends($data)->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/products.blade.php ENDPATH**/ ?>