<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalae0fc96714e2a5c93b226fc869a225dc21060012 = $component; } ?>
<?php $component = App\View\Components\Message::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Message::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae0fc96714e2a5c93b226fc869a225dc21060012)): ?>
<?php $component = $__componentOriginalae0fc96714e2a5c93b226fc869a225dc21060012; ?>
<?php unset($__componentOriginalae0fc96714e2a5c93b226fc869a225dc21060012); ?>
<?php endif; ?>

    <section>
        <div class="container">
            <div class="pb-5 row">
                <div class="col-lg-12 margin-tb">

                    <div class="pull-right">
                        <a class="primairy-button no-margin" href="<?php echo e(route('customerHome')); ?>">Terug</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo e(asset($pro->image)); ?>" class="img-fluid" alt="Product Image">
                </div>
                <div class="col-md-6">
                    <h1><?php echo e($pro->name); ?></h1>
                    <p> <?php echo e($pro->description); ?></p>
                    <ul>
                        <li><strong>Category:</strong> <?php echo e($pro->category->name); ?></li>
                        <li><strong>Verkoop Prijs:</strong>
                            <strong <?php if($pro->discount_percentage != 0): ?> style="text-decoration: line-through"
                                <?php else: ?> <?php endif; ?>>
                                € <?php echo e($pro->selling_price); ?></strong>
                            <?php if($pro->discount_percentage != 0): ?>
                            <strong class="sale-price">€
                                <?php echo e($pro->selling_price - ($pro->selling_price * $pro->discount_percentage) / 100); ?></strong>
                            <?php else: ?>
                            <?php endif; ?>
                        </li>
                        <li><strong>Korting %:</strong> <?php echo e($pro->discount_percentage); ?></li>
                        <li><strong>Voorraad:</strong>
                            <?php if($pro->stock <= 0): ?> <span class="out-of-stock">Uitverkocht</span>
                                <?php else: ?>
                                Nog <?php echo e($pro->stock); ?> op voorraad
                                <?php endif; ?>
                        </li>
                        <li><strong>Barcode:</strong> <?php echo e($pro->barcode); ?></li>
                        <li><strong>Afmetingen (B x H x D):</strong> <?php echo e($pro->width_cm); ?> cm x <?php echo e($pro->height_cm); ?> cm x
                            <?php echo e($pro->depth_cm); ?> cm
                        </li>
                        <li><strong>Gewicht:</strong> <?php echo e($pro->weight_gr); ?> kg</li>
                        <form action="/cart/add-item/" method="POST">
                            <?php echo csrf_field(); ?>
                            <p>
                                <label for="quantity">Hoeveelheid:</label><br>
                                <input name="quantity" class="product-quantity" type="number" min="1" value="1" max="<?php echo e($pro->stock); ?>">
                            </p>
                            <input hidden="true" name="product_id" value="<?php echo e($pro->id); ?>">
                            <input class="add-to-cart" type="submit" value="Toevoegen aan winkelwagen" />
                            <p>Bestel: 06-33024999</p>
                        </form>
                </div>
                <div class="card-group">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo e(asset($product->image)); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($product->name); ?></h5>
                            <p class="card-text"><?php echo e($product->description); ?></p>
                            <a href="/product/<?php echo e($product->id); ?>" class="add-to-cart">Bekijken</a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/product.blade.php ENDPATH**/ ?>