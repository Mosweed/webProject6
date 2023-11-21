<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

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
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php if(isset($data['categories']) && $category->id == $data['categories']): ?> selected <?php endif; ?>
                            <?php if(!isset($data['categories']) && $category->id == 1): ?> selected <?php endif; ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </form>
        </div>
        <div class="mt-5 row justify-content-start">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="pt-4 col-md-3 col-sm-4 col-6">
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
                                    <img src="images/check_circle_FILL0_wght400_GRAD0_opsz48.png">
                                </div>
                                <div class="product-card__delivery-text">
                                    Binnen 1-3 dagen bezorgd.
                                </div>
                            </div>
                            <div class="product-card__price">
                                <p
                                    <?php if($product->discount_percentage != 0): ?> style="text-decoration: line-through"
                                 <?php endif; ?>>
                                    € <?php echo e($product->selling_price); ?></p>
                                <?php if($product->discount_percentage != 0): ?>
                                    <span
                                        class="sale-price">€ <?php echo e($product->selling_price - ($product->selling_price * $product->discount_percentage) / 100); ?></span>
                                <?php else: ?>
                                <?php endif; ?>

                            </div>
                            <div class="product-card__stock">
                                <?php if($product->stock <= 0): ?>
                                    <span class="out-of-stock">Uitverkocht</span>
                                <?php else: ?>
                                    Nog <?php echo e($product->stock); ?> op voorraad
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="mt-4 row">
            <div class="pt-4 col-12">
                <?php echo e($products->appends($data)->links()); ?>

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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/index.blade.php ENDPATH**/ ?>