



    <section class="h-100 gradient-custom">
        
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
        <div class="container py-5">
            <div class="my-4 row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="mb-4 card" <?php if($cartitems->isEmpty()): ?> style="width: 500px" <?php endif; ?>>
                        <div class="py-3 card-header">
                            <h5 class="mb-0 w-1000">Winkelwagen</h5>
                        </div>
                        <div class="card-body">
                            <!-- Single item -->

                            <div class="row ">
                                <?php if(!empty($cartitems)): ?>
                                    <?php $__currentLoopData = $cartitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="mb-4 col-lg-3 col-md-12 mb-lg-0">
                                            <!-- Image -->
                                            <div class="rounded bg-image hover-overlay hover-zoom ripple cart-item-img"
                                                data-mdb-ripple-color="light">
                                                <img src="<?php echo e($cartItem->image); ?>" class="w-100"
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
                                            <p><strong><?php echo e($cartItem->name); ?></strong></p>

                                            <p><strong>€ <?php echo e($cartItem->selling_price); ?></strong></p>

                                            <button type="submit" class="m-0 primairy-button" title="Remove item"
                                                wire:click="removeItem(<?php echo e($cartItem->id); ?>)">
                                                <i class="bi bi-trash3"></i>
                                            </button>

                                        </div>

                                        <div class="mb-4 col-lg-4 col-md-6 mb-lg-0 position-relative">
                                            
                                            
                                            <div class="mb-4 d-flex justify-content-end align-items-center"
                                                style="max-width: 300px">

                                                <button class="quantity-change"
                                                    wire:click="decrementQty(<?php echo e($cartItem->id); ?>)">
                                                    <i class="bi bi-dash"></i>
                                                </button>

                                                <div class="form-outline">
                                                    
                                                    <input id="quantity-<?php echo e($cartItem->id); ?>" name="quantity"
                                                        max="<?php echo e($cartItem->stock); ?>" value="<?php echo e($cartItem->quantity); ?>"
                                                        type="number" class="form-control"
                                                        onchange="updateQuantity(<?php echo e($cartItem->id); ?>)" />
                                                </div>

                                                <button class="quantity-change"
                                                    wire:click="incrementQty(<?php echo e($cartItem->id); ?>)">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                            
                                            <!-- Price -->
                                            <p class="cart-item-price"
                                                <?php if($cartItem->discount_percentage != 0): ?> style="text-decoration: line-through" <?php endif; ?>>
                                                <strong>€ <?php echo e($cartItem->selling_price * $cartItem->quantity); ?></strong>
                                            </p>
                                            <?php if($cartItem->discount_percentage != 0): ?>


                                                <p class="text-start text-md-center sale-price">
                                                    <strong>
                                                        €
                                                        <?php echo e(number_format(($cartItem->selling_price - ($cartItem->selling_price * $cartItem->discount_percentage) / 100) * $cartItem->quantity, 2, '.', ',')); ?></strong>
                                                </p>
                                            <?php endif; ?>

                                            <!-- Price -->
                                        </div>
                                        <div class="mb-5 col-12"></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </div>
                            <!-- Single item -->

                        </div>
                    </div>
                    <div class="mb-4 card">
                        <div class="card-body">
                            <?php if(count($cartitems) > 0): ?>
                            <p><strong>Verwachte levertijd</strong></p>
                            <p class="mb-0"><?php echo e($expected_delivery_date); ?></p>
                            <?php else: ?>
                            <a href="/producten/" class="primairy-button no-margin">Zie meer</a>
                            <?php endif; ?>


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
                                    <span>€ <?php echo e($total); ?></span>
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
                                            <?php echo e($total); ?></strong></span>
                                </li>
                            </ul>

                            <a <?php if(count($cartitems) == 0): ?> style="pointer-events: none" <?php endif; ?>
                                class=" primairy-button" href="/checkout">
                                Rond bestelling af
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/livewire/shopcart.blade.php ENDPATH**/ ?>