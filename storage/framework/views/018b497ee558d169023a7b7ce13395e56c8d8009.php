<div class="mt-5">
    <h3>Geselecteerde producten:</h3>
    <table style="background-color: #e3e3e3;" class=" table">
        <tr>
            <th>Id</th>
            <th>Afbeelding</th>
            <th>Title</th>
            <th>Hoeveelheid</th>
            <th width="280px">Actie</th>
        </tr>
        <?php $__currentLoopData = $selected_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product['id']); ?></td>
                <td><img src=" <?php echo e($product['image']); ?>" width="100px"></td>
                <td><?php echo e($product['title']); ?></td>
                <td> <input min="1" type="number" wire:model="selectedProducts.<?php echo e($loop->index); ?>.qnty">
                </td>
                <td>
                    <a class="btn btn-danger" wire:click='removeProduct(<?php echo e($product['id']); ?>)'>Verwijder</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <?php if($isOrderSent): ?>
                <td>
                    <div class="alert alert-success">
                        Bestelling geplaatst.
                    </div>
                </td>
            <?php endif; ?>
            <td>
                <?php if(count($selected_products) > 0): ?>
                    <button wire:click="submitOrder" class="btn btn-info">Bestel</button>
                <?php endif; ?>
            </td>
        </tr>
    </table>


    <h3 class="mt-3">Beschikbare producten:</h3>
    <table class="table table-bordered">

        <tr>
            <th>Id</th>
            <th>Afbeelding</th>
            <th>Title</th>
            <th>Omschrijving</th>
            <th width="280px">Actie</th>
        </tr>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product['id']); ?></td>
                <td><img src=" <?php echo e($product['image']); ?>" width="100px"></td>
                <td><?php echo e($product['name']); ?></td>
                <td><?php echo e($product['description']); ?></td>
                <td>
                    <a class="btn btn-info" href="/groothandel/<?php echo e($product['id']); ?>">Zie meer</a>
                    <a class="btn btn-info" <a class="btn btn-info"
                        wire:click='selectProduct(<?php echo e($product['id']); ?>, <?php echo e(json_encode($product['image'])); ?>, <?php echo e(json_encode($product['name'])); ?>)'>Selecteer</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <?php echo e($products->links()); ?>

    <!-- Livewire component's blade view -->
    <script>
        // Listen for the 'order-sent' event
        document.addEventListener('livewire:load', function() {
            Livewire.on('order-sent', function(data) {
                // Display the success message
                alert(data.message);
            });
        });
    </script>

</div>
<?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/livewire/admin/groothandel/order/selectedproducts.blade.php ENDPATH**/ ?>