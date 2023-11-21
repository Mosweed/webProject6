<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Producten</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
                <a class="btn btn-success" href="<?php echo e(url('create')); ?>">Voeg een product toe</a>
            </div>


            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>



            <table class="table mb-0 table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Afbeelding</th>
                        <th>Title</th>
                        <th>Omschrijving</th>
                        <th>Status</th>
                        <th style="width: 150px">Verkoop prijs</th>
                        <th>Barcode</th>

                        <th width="280px">Actie</th>
                    </tr>
                </thead>

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$i); ?></td>


                        <td><img src=" <?php echo e(asset($product->image)); ?>" width="100px"></td>
                        <td><?php echo e($product->name); ?></td>
                        <td><?php echo e($product->description); ?></td>
                        <td><?php echo e($product->status); ?></td>
                        <td>€ <?php echo e($product->selling_price); ?></td>

                         <td> <?php echo DNS1D::getBarcodeHTML($product->barcode, 'EAN8', 2, 33, '#6A9758'); ?>

                            <br>
                            <?php echo e($product->barcode); ?>

                        </td>

                        <td>
                            <form action="<?php echo e(route('destroy', $product->id)); ?>" method="POST">

                                <a class="btn btn-info" href="<?php echo e(route('show', $product->id)); ?>">Zie meer</a>

                                <a class="btn btn-primary" href="<?php echo e(route('edit', $product->id)); ?>">Bijwerken</a>

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="submit" class="btn btn-danger">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>

            <?php echo e($products->links()); ?>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/admin/product/products.blade.php ENDPATH**/ ?>