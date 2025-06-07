<!DOCTYPE html>
<html lang="<?= __hepl('fr') ?>" class="no-js">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Seren Coban’s lovely Portfolio. Discover my recent projects and contact me if needed.">
    <meta name="author" content="Seren Coban">
    <meta itemprop="name" content="Seren Coban’s Portfolio">
    <meta name="keywords" content="Portfolio, Web Developer, Web Designer, Flower, Seren Coban, Optimization, Accessibility, SEO, Contact, Collaborations, Web Projects, Front-end, Back-end, Fullstack Skills">
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>

    <!-- Open Graph -->
    <meta property="og:title" content="<?= wp_title('·', false, 'right') . get_bloginfo('name') ?>">
    <meta property="og:description" content="Seren Coban’s lovely Portfolio. Discover my recent projects and contact me if needed.">
    <meta property="og:image" content="<?= get_template_directory_uri() ?>/resources/img/og-image.jpg">
    <meta property="og:image:alt" content="Seren Coban’s Portfolio">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= home_url() ?>">
    <meta property="og:site_name" content="<?= get_bloginfo('name') ?>">
    <meta property="og:locale" content="fr_FR">

    <link rel="icon" href="wp-content/themes/portfolio/resources/img/seren-logo.svg">
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
  <script src="<?= dw_asset('js') ?>" defer></script>
  <?php wp_head(); ?>
</head>
<body itemscope="" itemtype="https://schema.org/Person">
<header>
    <h1 class="hidden"><?php the_title(); ?></h1>
    <nav class="nav_menu" role="navigation" aria-label="<?= esc_attr__('Main navigation', 'portfolio'); ?>">
        <h2 class="hidden"></h2>
        <a class="nav__logo" href="<?= home_url() ?>" title="<?php esc_attr_e('Go to Home', 'portfolio'); ?>">
            <img class="logo" src="<?= get_template_directory_uri(); ?>/resources/img/logo.svg"
                 alt="<?php esc_attr_e("Home", "portfolio"); ?>" width="65" height="100">
        </a>
        <div id="menuToggle">
            <label for="menuCheckbox" class="visually-hidden">
                <?php esc_html_e('Toggle mobile menu', 'portfolio'); ?>
            </label>
            <input type="checkbox"
                   id="menuCheckbox"
                   aria-controls="mobileMenu"
                   aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
            <div id="mobileMenu" class="sidenav" aria-hidden="true" inert>
                <?php wp_nav_menu([
                    'container' => false,
                    'menu' => pll_current_language() === 'en' ? 'Header en' :
                        (pll_current_language() === 'fr' ? 'Header fr' : 'Header tr'),
                ]); ?>
            </div>
        </div>
        <div class="menu-desktop">
            <?php wp_nav_menu([
                'container' => false,
                'menu' => pll_current_language() === 'en' ? 'Header en' :
                    (pll_current_language() === 'fr' ? 'Header fr' : 'Header tr'),
            ]); ?>
        </div>
    </nav>
</header>
<main>