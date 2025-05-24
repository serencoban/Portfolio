<?php /* Template Name: Page "Home page" */ ?>

<?php get_header(); ?>

    <section class="header">
        <div class="header_elm">
            <h2 class="main_title">SEREN COBAN</h2>
            <p><?php echo get_field('sub_title') ?></p>
        </div>
    </section>

    <section class="about_me">
        <h3 class="hidden">About me</h3>
        <div class="about-text-container">
            <div class="about-me-text"><?php echo get_field('about_me'); ?></div>
            <a class="btn" href="<?php echo get_permalink(pll_get_post(get_page_by_path('about')->ID)); ?>">
                <?php echo get_field('btn') ?>
            </a>
        </div>
    </section>

    <section class="flower-stem-section">

        <div class="flower_and_stem">
            <div class="flower_ctn">
                <img src="<?php echo get_template_directory_uri(); ?>/resources/img/flower.png" alt="Lilies" class="flower">
            </div>

            <div class="stem">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="1359" viewBox="0 0 80 1359" fill="none">
                    <path d="M77.0002 1C77.0002 1 9.39734 195.048 9.39734 293.99C9.39734 392.932 67.637 557.283 69.4604 656.197C71.2838 755.11 7.07604 876.894 3.86415 989.372C0.652254 1101.85 53.4177 1246.82 49.5 1358.5" stroke="#898962" stroke-width="5.5"/>
                </svg>
            </div>
        </div>
        <div class="flower-stem-container">
            <?php if (have_rows('projects')) : ?>
                <?php while (have_rows('projects')) : the_row(); ?>
                    <div class="growth-step">
                        <svg class="petal" xmlns="http://www.w3.org/2000/svg" width="191" height="88" viewBox="0 0 191 88" fill="none">
                            <path d="M0 22.6961C10.2942 67.9019 55.3488 96.1901 100.632 85.8796L191 65.3036C180.705 20.0978 135.651 -8.19013 90.3671 2.12045L0 22.6961Z" fill="#898962"/>
                            <path d="M171 49.5C145.346 40.1383 118.688 50.1615 88.5002 51.5C43.2319 53.5072 22.8612 51.323 3.02718 24.2908" stroke="#EAE8C6" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <article class="project-content">
                            <div class="overlay">
                                    <a href="" title="Discover more information about<?php echo get_field('work-title') ?>" class="overlay-text">
                                        <img src="<?php get_field('work_img') ?>" alt="">
                                    </a>
                                <p class="overlay-text"><?php echo get_field('work_title') ?></p>
                            </div>
                        </article>
                    </div>
    <?php endwhile; ?>
    <?php endif; ?>
        </div>

    </section>
    <div class="see-more">
        <a class="btn" href="<?php echo get_permalink( get_page_by_path('works') ); ?>"><?php echo get_field('btn_plus'); ?></a>
    </div>

<?php get_footer(); ?>