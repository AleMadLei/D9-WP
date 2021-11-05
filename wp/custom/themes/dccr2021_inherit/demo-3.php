<?php

get_header(); ?>

<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
    <header class="page-header alignwide">
        <h1 class="page-title"><?php single_post_title(); ?></h1>
    </header><!-- .page-header -->
<?php endif; ?>
<main>
    <form method="post" action="">
        <label for="el_texto">El texto</label>
        <input id="el_texto" type="text" name="el_texto" placeholder="<?php print __('Add some text here.'); ?>"/>
        <div>
            <input type="submit" name="submit">
        </div>
    </form>

    <?php if (isset($_POST['el_texto'])) : ?>
        <?php if ($_POST['el_texto'] == 'siguiente') : ?>
            <?php print __('siguiente is the value added.'); ?><a href="<?php print get_site_url(NULL, 'wp-admin/options-general.php?page=dccr2021'); ?>">Ir al formulario administrativo.</a>
        <?php else : ?>
            El valor debe ser <strong>siguiente</strong>.
        <?php endif; ?>
    <?php endif; ?>
</main>

<?php

get_footer();
