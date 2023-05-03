
<?php $__env->startSection('header'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('header'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('sidebar'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\wampassets\Mouezant_Laravel\resources\views/backoffice/accueil.blade.php ENDPATH**/ ?>