<html>
    <title>Liste des Films</title>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
</head>
<body>
    <h1 onclick="test()">Liste des Films :</h1>
    <ul class="list-group" style="width: fit-content;">
    <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list-group-item list-group-item-primary"><?php echo e($film['titre']); ?>, <?php echo e($film['year']); ?></li> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <script src="<?php echo e(asset('/js/perso1.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\wamp64\www\wampassets\Mouezant_Laravel\resources\views/backoffice/Film/listFilms.blade.php ENDPATH**/ ?>