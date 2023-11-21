<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<script src="sweetalert2.all.min.js"></script>
<!-- Styles -->

    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/base/vendor.bundle.base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/style.css')); ?>">
    <link rel="shortcut icon" style="color: white" href="<?php echo e(asset('/storage/images/logo - Klein.svg')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
 
    <?php echo \Livewire\Livewire::styles(); ?>


</head>
<body>
    <div class="container-scroller">
        <?php echo $__env->make('layouts.inc.admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid page-body-wrapper">
            <?php echo $__env->make('layouts.inc.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <?php echo e($slot); ?>

                </div>
            </div>

        </div>
    </div>





    <script src="<?php echo e(asset('admin/vendors/base/vendor.bundle.base.js')); ?>" defer></>
    <script src="<?php echo e(asset('admin/vendors/chart.js/Chart.min.js')); ?>" defer></script>

    <script src="<?php echo e(asset('admin/vendors/datatables.net/jquery.dataTables.js')); ?>" defer></script>

    <script src="<?php echo e(asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')); ?>" defer></script>

    <script src="<?php echo e(asset('admin/js/off-canvas.js')); ?>" defer></script>

    <script src="<?php echo e(asset('admin/js/hoverable-collapse.js')); ?>" defer></script>

    <script src="<?php echo e(asset('admin/js/template.js')); ?>" defer></script>

    <script src="<?php echo e(asset('admin/js/dashboard.js')); ?>" defer></script>

    <script src="<?php echo e(asset('admin/js/data-table.js')); ?>" defer></script>

    <script src="<?php echo e(asset('admin/js/jquery.dataTables.js')); ?>" defer></script>

    <script src="<?php echo e(asset('admin/js/dataTables.bootstrap4.js')); ?>" defer></script>

    <!-- laravel charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


    <?php echo \Livewire\Livewire::scripts(); ?>

</body>
</html>
<?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/components/admin.blade.php ENDPATH**/ ?>