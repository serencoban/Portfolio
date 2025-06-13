<?php /* Template Name: Page "Home page" */ ?>

<?php get_header(); ?>

    <section class="header_hero">
        <div class="header_hero_elm">
            <h2 class="main_title" itemprop="name">SEREN COBAN</h2>
            <p itemprop="jobTitle"><?php echo get_field('sub_title') ?></p>
        </div>
    </section>
    <section class="about_me">
        <h3 class="sro">About me</h3>
        <div class="about-text-container">
            <div itemprop="description" class="about-me-text"><?php echo get_field('about_me'); ?></div>
            <a class="btn"
               href="<?php echo get_permalink(pll_get_post(get_page_by_path('about')->ID)); ?>"
               title="<?php echo esc_attr(pll__('Learn more about me')); ?>">
                <?php echo get_field('btn'); ?>
            </a>
        </div>
    </section>

    <section class="flower-stem-section" itemprop="knowsAbout" itemscope="" itemtype="https://schema.org/CreativeWork">
        <h2 class="sro">My works</h2>
        <div class="flower_and_stem" aria-hidden="true" focusable="false">
            <div class="flower_ctn">
                <img src="<?php echo get_template_directory_uri(); ?>/resources/img/flower.png" alt="Illustration of lily flower" class="flower">
            </div>
            <div class="stem">
                <svg xmlns="http://www.w3.org/2000/svg" width="85" height="1375" viewBox="0 0 85 1375" fill="none">
                    <path d="M81.5 1C81.5 1 27.0001 212 28.9999 310.5C30.9997 409 81.5 517.5 69 613C56.5 708.5 -7.00013 879.5 4.49985 988.5C15.9998 1097.5 84.4174 1262.82 80.4997 1374.5" stroke="#898962" stroke-width="5.5"/>
                </svg>
            </div>
        </div>
        <div class="flower-stem-container">
            <?php
            $projects = new WP_Query([
                'post_type' => 'work',
                'posts_per_page' => 3,
            ]);
            if ($projects->have_posts()) :
                while ($projects->have_posts()) : $projects->the_post();

                    $img = get_field('work_img');
                    $title = get_field('work_title');
                    $link = get_permalink();
                    ?>
                    <div class="growth-step">
                        <svg class="petal" xmlns="http://www.w3.org/2000/svg" width="191" height="88" viewBox="0 0 191 88" fill="none">
                            <path d="M0 22.6961C10.2942 67.9019 55.3488 96.1901 100.632 85.8796L191 65.3036C180.705 20.0978 135.651 -8.19013 90.3671 2.12045L0 22.6961Z" fill="#898962"/>
                            <path d="M171 49.5C145.346 40.1383 118.688 50.1615 88.5002 51.5C43.2319 53.5072 22.8612 51.323 3.02718 24.2908" stroke="#EAE8C6" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <article class="project-content" itemprop="workExample">
                            <h3 class="sro"><?= esc_html($title); ?></h3>
                            <div class="overlay">
                                <a href="<?= esc_url($link); ?>" title="Discover more information about <?= esc_attr($title); ?>" class="overlay-link">
                                    <?php if ($img): ?>
                                        <img src="<?= esc_url($img['url']); ?>" alt="<?= esc_attr($img['alt'] ?: 'Image du projet ' . $title); ?>">

                                    <?php endif; ?>
                                    <span class="overlay-text" itemprop="name"><?= esc_html($title); ?></span>
                                    <span class="overlay-bg"></span>
                                </a>
                            </div>
                        </article>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p class="projects__empty">Il n'y a pas de projets à présenter.</p>
            <?php endif; ?>
        </div>
    </section>
    <div class="see-more">
        <a class="btn" title="Discover more works" href="<?php echo get_permalink( get_page_by_path('works') ); ?>"><?php echo get_field('btn_plus'); ?></a>
    </div>
<?php get_footer(); ?>