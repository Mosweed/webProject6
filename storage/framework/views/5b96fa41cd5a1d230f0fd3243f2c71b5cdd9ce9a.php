<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <style>
      *{
      margin:0;
      padding:0;
      box-sizing:border-box;
  }
  .body{
      font-family: 'Poppins', sans-serif;
      background-color:white;
      min-height:100vh;
      display: flex;
      align-items: center;
      justify-content: center;
  }
  .wrapper{
      text-align: center;
  }
  .wrapper h2{
      margin:40px 0;
      font-size:2.5rem;
  }
  .wrapper img{
      width:600px;
      max-width:75%;
  }
  .wrapper h4{
      margin:40px 0 20px;
      font-size:1.2rem;
  }
  .main-btn{
      padding:15px;
      background-color: #6A9758;
      color:#fff;
      border:none;
      font-weight:700;
      letter-spacing: 1px;
      border-radius: 6px;
      cursor: pointer;
  }

  @media (max-width:767px){
      .wrapper h2{
          font-size:2rem;
      }
      .wrapper h4{
          font-size:1rem;
      }
  }

    </style>

  <div class="body" >
      <div class="wrapper">
          <h3>Betaling is gelukt</h3>
          <div>
              <img  src="/storage/images/successful.svg" alt="successful" />
          </div>
      </div>
  </div>
   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH D:\School\pro\Nieuwe map\Projact6\GV-site\resources\views/successful.blade.php ENDPATH**/ ?>