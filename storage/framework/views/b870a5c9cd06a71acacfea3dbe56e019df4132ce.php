<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<section>
    <div class="row">
        <div class="mb-4 col-md-8">
            <div class="mb-4 card">
                <div class="py-3 card-header">
                    <h5 class="mb-0">Factureringsgegevens</h5>
                </div>
                <div class="card-body">
                    <form  action="/checkout/test/" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>

                        <div class="mb-4 row">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" name="first_name" class="form-control" placeholder="Voornaam"
                                        value="<?php echo e(auth()->user()->castomer->firstname); ?>" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" name="last_name" class="form-control" placeholder="Achternaam"
                                        value="<?php echo e(auth()->user()->castomer->lastname); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 form-outline">
                            <input type="text " name="country" class="form-control" placeholder="Land"
                                value="<?php echo e(auth()->user()->castomer->country); ?>" />
                        </div>
                        <div class="mb-4 form-outline">
                            <input type="text" name="address" class="form-control" placeholder="Straat en huisnummer"
                                value="<?php echo e(auth()->user()->castomer->address); ?>" />
                        </div>
                        <div class="mb-4 form-outline">
                            <input type="text" name="zip" class="form-control" placeholder="Postcode "
                                value="<?php echo e(auth()->user()->castomer->zipcode); ?>" />
                        </div>

                        <div class="mb-4 form-outline">
                            <input type="text" name="city" class="form-control" placeholder="Plaats "
                                value="<?php echo e(auth()->user()->castomer->city); ?>" />
                        </div>

                        <div class="mb-4 form-outline">
                            <input type="text" name="phone" class="form-control" placeholder="Telefoon "
                                value="<?php echo e(auth()->user()->castomer->phonenumber); ?>" />
                        </div>
                        <div class="mb-4 form-outline">
                            <input type="email" name="email" class="form-control" placeholder="E-mailadres"
                                value="<?php echo e(auth()->user()->email); ?>" />
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
                        <?php
                            $total = 0;
                        ?>
                        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li
                                class="px-0 pb-0 border-0 list-group-item d-flex justify-content-between align-items-center">
                                <?php echo e($product->name); ?> x <?php echo e($product->quantity); ?>

                                <span> €<?php echo e(number_format($product->shopcartitem_price, 2, '.', ',')); ?></span>
                                <?php
                                    $total += $product->shopcartitem_price;

                                ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <span><strong> €<?php echo e($total); ?></strong></span>
                        </li>
                    </ul>

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
<?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/checkout.blade.php ENDPATH**/ ?>