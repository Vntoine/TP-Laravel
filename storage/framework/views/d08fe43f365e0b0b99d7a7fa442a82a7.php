<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="#!">BIENVENUE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Films
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="<?php echo e(route('film.article')); ?>">Articles</a>
                        <a class="dropdown-item" href="<?php echo e(route('film.list')); ?>">Liste</a>
                        <a class="dropdown-item" href="<?php echo e(route('film.fluxrss')); ?>">Flux RSS</a>
                        <a class="dropdown-item" href="#">Quizz</a>
                    </div>
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
                <?php else: ?>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasAnyRole', 'journaliste|redacteur|admin')): ?> 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestions articles
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasAnyRole', 'journaliste|admin')): ?>
                                    <a class="dropdown-item" href="#">Création</a>
                                    <a class="dropdown-item" href="#">Modification</a>
                                    <a class="dropdown-item" href="#">Suppression</a>
                                <?php endif; ?>
                                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasAnyRole', 'redacteur|admin')): ?>
                                    <a class="dropdown-item" href="#">Publication</a>
                                <?php endif; ?>
                            </div>
                        </li>';
                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasAnyRole', 'journaliste|admin')): ?>    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestions Films
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                <a class="dropdown-item" href="#">Création</a>
                                <a class="dropdown-item" href="#">Modification</a>
                                <a class="dropdown-item" href="#">Suppression</a>
                            </div>
                        </li>';
                        <?php endif; ?>  
                    <?php endif; ?> 
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasAnyRole', 'drh|admin')): ?> 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestions users
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
                                <a class="dropdown-item" href="#">Création</a>
                                <a class="dropdown-item" href="#">Modification</a>
                                <a class="dropdown-item" href="#">Actif</a>
                                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                                    <a class="dropdown-item" href="#">Suppression</a>
                                <?php endif; ?>
                            </div>
                        </li>'; 
                    <?php endif; ?> 
                        <li class="nav-item"><a class="nav-link" href="#">Profil</a></li>               
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Deconnexion</a></li>
                        <form class="visually-hidden" id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\wamp64\www\wampassets\Mouezant_Laravel\resources\views/backoffice/inc/navbar.blade.php ENDPATH**/ ?>