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
                <h2>Bewerk: <?php echo e($product->name); ?></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('index')); ?>"> Terug</a>
            </div>
        </div>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Er blijken wat fouten te zijn met de ingevulde waardes.<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Naam:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Naam"
                        value="<?php echo e($product->name); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Omschrijving:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Omschrijving"> <?php echo e($product->description); ?></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <img height="250" src="<?php echo e($product->image); ?>" width="250" id="image_preview_container">

                    <strong>Foto:</strong>
                    <input type="file" name="image" id="image">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>category:</strong>
                    <select class="form-control" name="categorie_id">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($category->id == $product->categorie_id): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>">
                                <?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            

            <?php if($product->kuin_id != null): ?>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Leverancier:</strong>
                    <h1 class="form-control">
                        Kuin
                    </h1>
                </div>
            </div>
            <?php endif; ?>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Verkoop Prijs:</strong>
                    <input type="number" name="selling_price" class="form-control" placeholder="Verkoop Prijs"
                        value="<?php echo e($product->selling_price); ?>">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Inkoop Prijs:</strong>
                    <input type="number" name="purchase_price" class="form-control" placeholder="Inkoop Prijs"
                        value="<?php echo e($product->purchase_price); ?>">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Korting %:</strong>
                    <input type="number" name="discount_percentage" class="form-control" placeholder="Korting %"
                        value="<?php echo e($product->discount_percentage); ?>" max="100">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="form-control" name="status">
                        <option <?php if($product->status == 1): ?> selected <?php endif; ?> value="1">Puplish</option>
                        <option <?php if($product->status == 0): ?> selected <?php endif; ?> value="0">Unpuplish</option>

                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>barcode:</strong>
                    <input type="number" name="barcode" class="form-control" placeholder="barcode"
                        value="<?php echo e($product->barcode); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Voorraad:</strong>
                    <input type="number" name="stock" class="form-control" placeholder="Voorraad"
                        value="<?php echo e($product->stock); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hoogte in cm:</strong>
                    <input type="number" name="height_cm" class="form-control" placeholder="Hoogte in cm"
                        value="<?php echo e($product->height_cm); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Breedte in cm:</strong>
                    <input type="number" name="width_cm" class="form-control" placeholder="Breedte in cm"
                        value="<?php echo e($product->width_cm); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Diepte in cm:</strong>
                    <input type="number" name="depth_cm" class="form-control" placeholder="Diepte in cm"
                        value="<?php echo e($product->depth_cm); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gewicht in gr:</strong>
                    <input type="number" name="weight_gr" class="form-control" placeholder="Gewicht in gr"
                        value="<?php echo e($product->weight_gr); ?>">
                </div>
            </div>

            <div class="text-center col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </div>
        </div>

    </form>

    <script src="<?php echo e(asset('js/profileupdate.js')); ?>"></script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>