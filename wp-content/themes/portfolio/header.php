<!DOCTYPE html>
<html lang="<?= __hepl('fr') ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Seren Coban’s lovely Portfolio. Discover my recent projects and contact me to create something real.">
    <meta name="author" content="Seren Coban">
    <meta itemprop="name" content="Seren Coban’s Portfolio">
    <meta name="keywords" content="Portfolio, Web Developer, Web Designer, Flower, Seren Coban, Optimization, Accessibility, SEO, Contact, Collaborations, Web Projects, Front-end, Back-end, Fullstack Skills">
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="icon" href="wp-content/themes/portfolio/resources/img/seren-logo.svg">
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
  <script src="<?= dw_asset('js') ?>" defer></script>
  <?php wp_head(); ?>
</head>
<body>
<header>

    <h1 class="hidden"><?php the_title(); ?></h1>
    <nav class="nav_menu">
        <h2 class="hidden"></h2>
        <a class="nav__logo" href="<?= home_url() ?>" title="<?php echo esc_attr__('Go to Home', 'portfolio'); ?>">
        <img class="logo" src="/wp-content/themes/portfolio/resources/img/logo.svg" alt="" height="100" width="65">
        </a>

        <div id="menuToggle">
            <label for="menuCheckbox"></label>
            <input type="checkbox" id="menuCheckbox">
                <span></span>
                <span></span>
                <span></span>
            <div class="sidenav">
                <?php wp_nav_menu([
                        'theme_location' => 'Header',
                    'container' => false
                ]); ?>
            </div>
        </div>
        <div class="menu-desktop">
            <?php wp_nav_menu([
                'theme_location' => '', // pas besoin ici
                'container' => false,
                'menu' => pll_current_language() === 'en' ? 'Header en' : (pll_current_language() === 'fr' ? 'Header fr' : 'Header tr'),
            ]); ?>
        </div>
    </nav>
</header>
<main>