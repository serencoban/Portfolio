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
        <h2 class="hidden">Main navigation</h2>
        <a href="">
            <img src="wp-content/themes/portfolio/resources/img/seren-logo.svg" alt="">
        </a>
        <div class="menu-icon">
            <input type="checkbox" id="checkbox_toggle" class="menu-checkbox" />
            <label for="checkbox_toggle" class="menu-label">
                <span></span>
                <span></span>
            </label>
        </div>
        <div class="nav_links">
            <?php wp_nav_menu([
                'menu_class' => 'main-nav'
            ]); ?>
        </div>
    </nav>
</header>
<main>
