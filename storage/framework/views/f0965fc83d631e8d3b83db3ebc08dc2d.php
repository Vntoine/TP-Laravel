<h1>Liste des Films</h1>
<table id="table" data-toggle="table" data-search="true" data-search-highlight="true" data-mobile-responsive="true" data-check-on-init="true" data-pagination="true">
    <thead>
        <tr>
            <th data-sortable="true" data-field="titre">Titre</th>
            <th data-sortable="true" data-width="10" data-width-unit="%" data-field="year">Année</th>
            <th data-sortable="true" data-width="10" data-width-unit="%" data-field="note">Note</th>
            <th data-field="genre" data-width="20" data-width-unit="%" data-searchable="false">Genre</th>
            <th data-field="bandeAnnonce" data-visible="false" data-searchable="false">Bande Annonce</th>
            <th data-field="synopsis" data-visible="false" data-searchable="false">Synopsis</th>
            <th data-field="operate" data-width="10" data-width-unit="%" data-searchable="false" data-formatter="operateFormatter" data-events="operateEvents">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($film->titre); ?></td>
                <td><?php echo e($film->year); ?></td>
                <td><?php echo e($film->notation); ?></td>
                <td>

                <?php $__currentLoopData = $film->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($genre->pivot->principal): ?>
                        <b><?php echo e($genre->nom); ?> </b>
                    <?php else: ?>
                        <?php echo e($genre->nom); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td>
                <?php if(isset($film->bandes_annonce->link)): ?>
                        <?php echo e($film->bandes_annonce->link); ?>

                <?php endif; ?>
                </td>
                <td><?php echo e($film->synopsis); ?></td>
                <td></td>
            </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\wampassets\Mouezant_Laravel\resources\views/backoffice/film/index.blade.php ENDPATH**/ ?>