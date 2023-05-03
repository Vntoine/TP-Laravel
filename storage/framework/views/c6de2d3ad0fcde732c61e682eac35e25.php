<?php
    $nb = 1;
    $image = '';
?>
<div class='accordion' id='accordionAccueil'>
    <?php if(isset($xml1)): ?>
        <div class='accordion-item'>
            <h2 class='accordion-header' id='headingAlloCine'>
            <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapseAlloCine' aria-expanded='true' aria-controls='collapseAlloCine'>
                <h4>ALLO AlloCine</h4>
            </button>
            </h2>
            <div id='collapseAlloCine' class='accordion-collapse collapse show' aria-labelledby='headingAlloCine' data-bs-parent='#accordionAccueil'>
                <div class='accordion-body'>
                    <h2><?php echo e($xml1->channel->title); ?></h2>
                    <div class="container-fluid bg-dark">
                        <div class="d-flex flex-row flex-wrap justify-content-left mb-3">
                            <?php $__currentLoopData = $xml1->channel->item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card text-white bg-dark col-12 col-sm-6 col-lg-4">
                                    <div class="card-body">
                                        <h3 class="card-title"><?php echo e($item->title); ?></h3>
                                        <a href="<?php echo e($item->link); ?>" class="card-link">LIEN</a>
                                        <?php echo $item->description; ?>

                                    </div>
                                    <img class="card-img-bottom" src="<?php echo e($item->enclosure['url']); ?>" alt="Card image cap">
                                </div>
                                <?php if($nb==6): ?>
                                    <?php break; ?>
                                <?php endif; ?>
                                <?php ($nb++); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(isset($xml2)): ?>
        <div class='accordion-item'>
            <h2 class='accordion-header' id='headingLeMonde'>
            <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapseLeMonde' aria-expanded='true' aria-controls='collapseLeMonde'>
                <h4>FLUX LeMonde</h4>
            </button>
            </h2>
            <div id='collapseLeMonde' class='accordion-collapse collapse' aria-labelledby='headingLeMonde' data-bs-parent='#accordionAccueil'>
                <div class='accordion-body'>
                <h2><?php echo e($xml2->channel->title); ?></h2>
                <div class="container-fluid bg-dark">
                        <div class="d-flex flex-row flex-wrap justify-content-left mb-3">
                            <?php ($nb=1); ?>
                            <?php $__currentLoopData = $xml2->channel->item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card text-white bg-dark col-12 col-sm-6 col-lg-4">
                                    <div class="card-body">
                                        <h3 class="card-title"><?php echo e($item->title); ?></h3>
                                        <a href="<?php echo e($item->link); ?>" class="card-link">LIEN</a>
                                        <p><?php echo e($item->description); ?></p>
                                    </div>
                                    <?php
                                    $image = '';
                                    foreach ($item->children('media', true) as $k => $v) {
                                        $attributes = $v->attributes();
                                        if (count($attributes) == 0) {
                                            continue;
                                        } else {
                                            $image = $attributes->url;
                                        }} 
                                    ?>

                                    <img class="card-img-bottom" src="<?php echo e($image); ?>" alt="text alternatif">
                                </div>
                                <?php if($nb==6): ?>
                                    <?php break; ?>
                                <?php endif; ?>
                                <?php ($nb++); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div><?php /**PATH C:\wamp64\www\wampassets\Mouezant_Laravel\resources\views/backoffice/film/rss.blade.php ENDPATH**/ ?>