<?php /* Template Name: Page "Mentions" */ ?>
<?php get_header(); ?>
<div class="mentions-container">
<h1 role="heading"><?php the_title(); ?></h1>
    <div class="mentions-ctn mentions-flower">
            <?php
            $flower = get_field('flower_img');
            if ($flower) :
                echo wp_get_attachment_image($flower['ID'], 'full', false, [
                    'alt' => esc_attr($flower['alt'] ?: 'Illustration of lily flower'),
                    'class' => 'flower',
                    'role' => 'presentation'
                ]);
            endif;
            ?>
        <div>
            <h2><?php echo get_field('edit_title'); ?></h2>
            <p><?php echo get_field('editeur_site'); ?></p>
        </div>
    </div>
<div class="mentions-ctn">
    <h2><?php echo get_field('heb_title'); ?></h2>
    <p><?php echo get_field('hebergement'); ?></p>
    </div>
<div class="mentions-ctn">
        <h2><?php echo get_field('propri_title'); ?></h2>
    <p><?php echo get_field('propriete_intellectuelle'); ?></p>
    </div>
<div class="mentions-ctn">
        <h2><?php echo get_field('cookies_title'); ?></h2>
    <p><?php echo get_field('utilisation_des_cookies'); ?></p>
    </div>
<div class="mentions-ctn">
        <h2><?php echo get_field('data_title'); ?></h2>
        <p><?php echo get_field('donnees_personnelles'); ?></p>
    </div>
</div>
<?php get_footer(); ?>
