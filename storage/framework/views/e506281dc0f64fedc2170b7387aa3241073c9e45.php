<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Groene vingers</title>

    <!-- Fonts s-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap-grid.min.css"
        integrity="sha512-JQksK36WdRekVrvdxNyV3B0Q1huqbTkIQNbz1dlcFVgNynEMRl0F8OSqOGdVppLUDIvsOejhr/W5L3G/b3J+8w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('/storage/images/logo - Klein.svg')); ?>">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="sweetalert2.all.min.js"></script>
    <!-- Styles -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
    <!-- slick -->
    <!-- <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    // Add the new slick-theme.css if you want the default styling
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" /> -->


    <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body class="theme-body__test">
    <header>
        <div class="header-logo">
            <a href="/">
                
                <img style="width: 100%" height="40" src="/storage/images/logo.svg" alt="logo" /> </a>
        </div>
        <div class="menu-wrapper">
            <div class="menu-item <?php echo e((request()->is('/')) ? 'active' : ''); ?>">
                <a class="" href="/">
                    Home
                </a>
            </div>
            <div class="menu-item <?php echo e((request()->is('producten')) ? 'active' : ''); ?>">
                <a href="/producten">
                    Producten
                </a>
            </div>
            <div class="menu-item <?php echo e((request()->is('overons')) ? 'active' : ''); ?>">
                <a href="/overons">
                    Over ons
                </a>
            </div>
            <div class="menu-item <?php echo e((request()->is('contact')) ? 'active' : ''); ?>">
                <a href="/contact">
                    Contact
                </a>
            </div>
            <?php if(auth()->guard()->check()): ?>

            <?php if(Auth::user()->role == 'admin' || Auth::user()->role == 'management' || Auth::user()->role == 'humanresources' ): ?>
            <div class="menu-item">
                <a href="/dashboard">
                    Dashboard
                </a>
            </div>
            <?php endif; ?>
            <?php if(Auth::user()->role == 'user'): ?>
            <div class="menu-item <?php echo e((request()->is('bestellingen')) ? 'active' : ''); ?>">
                <a href="/bestellingen">
                    Bestelgeschiedenis
                </a>
            </div>
            

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cartcounter', [])->html();
} elseif ($_instance->childHasBeenRendered('9GuguvY')) {
    $componentId = $_instance->getRenderedChildComponentId('9GuguvY');
    $componentTag = $_instance->getRenderedChildComponentTagName('9GuguvY');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9GuguvY');
} else {
    $response = \Livewire\Livewire::mount('cartcounter', []);
    $html = $response->html();
    $_instance->logRenderedChild('9GuguvY', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

            <?php endif; ?>
            <?php if(Auth::user()->role == 'admin'): ?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.groothandel.myordercounter', [])->html();
} elseif ($_instance->childHasBeenRendered('yZDMUcF')) {
    $componentId = $_instance->getRenderedChildComponentId('yZDMUcF');
    $componentTag = $_instance->getRenderedChildComponentTagName('yZDMUcF');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('yZDMUcF');
} else {
    $response = \Livewire\Livewire::mount('admin.groothandel.myordercounter', []);
    $html = $response->html();
    $_instance->logRenderedChild('yZDMUcF', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

            
            <?php endif; ?>

            <div class="menu-item">
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <a class="primairy-button no-margin" :href="route('logout')" onclick="event.preventDefault();
                             this.closest('form').submit();">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                    </a>
                </form>
            </div>
            <div class="header-icon">
                <a href="/profile">
                    <img class="header-icon" src="<?php echo e(Avatar::create(auth()->user()->name)->toBase64()); ?>" alt="profile" />
                </a>
            </div>
            
        <?php endif; ?>
        <?php if(auth()->guard()->guest()): ?>
        <div class="menu-item">
            <a class="primairy-button no-margin" href="/login">
                Login
            </a>
        </div>
        <div class="menu-item">
            <a class="primairy-button no-margin" href="/register">
                Register
            </a>
        </div>
        <?php endif; ?>
        </div>


        </div>
    </header>
    
    <main>
        <?php echo e($slot); ?>

    </main>
    <?php echo \Livewire\Livewire::scripts(); ?>


</body>
</html>
<?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/components/header.blade.php ENDPATH**/ ?>