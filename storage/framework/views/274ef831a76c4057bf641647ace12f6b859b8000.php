<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin'); ?>
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
<div class="container mt-3 mt-md-5">

    <div class="mb-4 card w-100">
        <div class="py-3 card-header">
            <h5 class="mb-0">Bestellingen</h5>
        </div>
        <div class="col-12">
            <div class="mb-5 list-group">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="p-3 list-group-item bg-snow" style="position: relative;">
                    <div class="row w-100 no-gutters">
                        <div class="col-6 col-md">
                            <h6 class="mb-0 text-charcoal w-100">Bestelling Nummer</h6>
                            <p class="mb-0 mb-2 text-pebble w-100 mb-md-0">#<?php echo e($order->id); ?></p>
                        </div>

                        <div class="col-3 col-md">
                            <h6 class="mb-0 text-charcoal w-100">Status</h6>
                            <p class="mb-0 mb-2 text-pebble w-100 mb-md-0"><?php echo e($order->status); ?></p>
                        </div>
                         <div class="col-3 col-md">
                            <h6 class="mb-0 text-charcoal w-100">geïmporteerde producten</h6>
                            <p class="mb-0 mb-2 text-pebble w-100 mb-md-0"><b> <?php echo e($order->orderItems->where('imported', 1)->count()); ?> / <?php echo e($order->orderItems->count()); ?></b></p>
                        </div>
                        <div class="col-12 col-md-3">
                            <a href="<?php echo e(route('myorders.show', $order->Order_id)); ?>" class="float-left p-2 text-decoration-none btn-info">Bekijk de bestelling</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/admin/Groothandel/myorders.blade.php ENDPATH**/ ?>