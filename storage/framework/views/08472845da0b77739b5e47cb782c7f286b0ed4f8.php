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
                <h2><?php echo e($product['name']); ?></h2>


            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/groothandel/"> Terug</a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="<?php echo e($product['image']); ?>" class="img-fluid" alt="Product Image">
          </div>
          <div class="col-md-6">
            <h1>  <?php echo e($product['name']); ?></h1>
            <p> <?php echo e($product['description']); ?></p>
            <ul>
              <li><strong> Prijs:</strong> €<?php echo e($product['price']); ?></li>
              <li><strong>Afmetingen (B x H x D):</strong> <?php echo e($product['price']); ?> cm x <?php echo e($product['height_cm']); ?> cm x <?php echo e($product['depth_cm']); ?> cm</li>
              <li><strong>Gewicht:</strong> <?php echo e($product['weight_gr']); ?> kg</li>
            </ul>
        </div>
      </div>


    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/admin/groothandel/show.blade.php ENDPATH**/ ?>