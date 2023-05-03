<!DOCTYPE HTML>
<html class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta-->
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', 'cinéma,film,films à l\'affiche'); ?>" />
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Equipe de passionné(e)s de Cinéma. Nous sommes heureux de vous présenter nos coups de coeur, recommandés par de fous furieux !'); ?>)" />
    <meta name="author" content="<?php echo $__env->yieldContent('author', 'BTS SIO CARCOUET'); ?>)" />
    <title><?php echo e($title); ?></title>
    <!-- CSRF for AJAX -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <!-- Scripts spécifiques-->
    <?php if(isset($jshead)): ?>
        <?php echo $jshead; ?>

    <?php endif; ?>
</head>
<body>
    <!-- begin header -->
    <?php $__env->startSection('header'); ?>
        <?php echo $__env->make('backoffice.inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    <!-- end header -->
    <!-- begin navbar -->
    <?php $__env->startSection('navbar'); ?>
        <?php echo $__env->make('backoffice.inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    <!-- end navbar -->
    <!-- content -->
    <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
                <?php if(isset($contentviacontroller)): ?>
                    <?php echo $contentviacontroller; ?>

                <?php endif; ?>
                <?php if(isset($slot)): ?>
                    <?php echo e($slot); ?>

                <?php endif; ?>
                <?php if(isset($includeviews)): ?>
                    <?php if($includeviews): ?>
                        <?php $__currentLoopData = $vues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make($vue, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php echo $__env->make($vue, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
                    <?php endif; ?>
                <?php endif; ?>

    <!—end content -->
    </div>
    <!-- begin footer -->
    <?php $__env->startSection('footer'); ?>
        <?php echo $__env->make('backoffice.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    <!-- end footer -->
    <?php if(isset($jsfoot)): ?>
            <?php echo $jsfoot; ?>

    <?php endif; ?>
</body>
</html><?php /**PATH C:\wamp64\www\wampassets\Mouezant_Laravel\resources\views/backoffice/master.blade.php ENDPATH**/ ?>