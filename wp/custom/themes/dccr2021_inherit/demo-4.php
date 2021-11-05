<?php

get_header(); ?>

<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
    <header class="page-header alignwide">
        <h1 class="page-title"><?php single_post_title(); ?></h1>
    </header><!-- .page-header -->
<?php endif; ?>
<main>
    para usuarios con permiso de acceso de contenido.
    <a href="../demo-3">Ir al demo 3</a>
</main>

<?php

get_footer();
