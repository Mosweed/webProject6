<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <style>
    </style>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="mb-5">Groothandel producten</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
                <h4>Contact gegevens</h4>
                <p>Directrice: Anne Kuin</p>
                <p><strong>Bestel telefoonnummer: 06-91204657</strong></p>
                <p>Adres: Kruiswaal 16 1161 AM Zwanenburg</p>
                <p>E-mailadres: AnneKuin@kuinshop.com, info@kuinshop.com</p>
            </div>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.groothandel.order.selectedproducts', [])->html();
} elseif ($_instance->childHasBeenRendered('GWgpGv0')) {
    $componentId = $_instance->getRenderedChildComponentId('GWgpGv0');
    $componentTag = $_instance->getRenderedChildComponentTagName('GWgpGv0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('GWgpGv0');
} else {
    $response = \Livewire\Livewire::mount('admin.groothandel.order.selectedproducts', []);
    $html = $response->html();
    $_instance->logRenderedChild('GWgpGv0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    
    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/admin/groothandel/groothandel.blade.php ENDPATH**/ ?>