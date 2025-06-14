<?php /* Template Name: Page "Home page" */ ?>
<?php get_header(); ?>

<main id="main" role="main" itemscope itemtype="https://schema.org/WebPage">

    <section class="header_hero">
        <div class="header_hero_elm">
            <h2 id="main-title" class="main_title" itemprop="name">SEREN COBAN</h2>
            <p itemprop="jobTitle"><?php echo esc_html(get_field('sub_title')); ?></p>
        </div>
    </section>

    <section class="about_me">
        <h2 id="about-title" class="sro"><?php echo esc_html__('About me', 'hepl-trad'); ?></h2>
        <div class="about-text-container">
            <div itemprop="description" class="about-me-text">
                <?php echo wp_kses_post(get_field('about_me')); ?>
            </div>
            <a class="btn"
               href="<?php echo get_permalink(pll_get_post(11)); ?>"
               title="<?php echo esc_attr__('Learn more about me', 'hepl-trad'); ?>"
               aria-label="<?php echo esc_attr__('Learn more about me', 'hepl-trad'); ?>">
                <?php echo esc_html(get_field('btn')); ?>
            </a>
        </div>
    </section>

    <section class="flower-stem-section" itemscope itemtype="https://schema.org/CreativeWork">
        <h2 id="works-title" class="sro"><?php echo esc_html__('My works', 'hepl-trad'); ?></h2>

        <div class="flower_and_stem" aria-hidden="true">
            <div class="flower_ctn">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/resources/img/flower.png"
                     alt="Illustration of lily flower"
                     class="flower" role="presentation"
                    width="323">
            </div>
            <div class="stem">
                <svg xmlns="http://www.w3.org/2000/svg" width="85" height="1375" viewBox="0 0 85 1375"
                     aria-hidden="true" focusable="false">
                    <path d="M81.5 1C81.5 1 27.0001 212 28.9999 310.5C30.9997 409 81.5 517.5 69 613C56.5 708.5 -7.00013 879.5 4.49985 988.5C15.9998 1097.5 84.4174 1262.82 80.4997 1374.5"/>
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
                        <svg class="petal" xmlns="http://www.w3.org/2000/svg" width="191" height="88"
                             viewBox="0 0 191 88" aria-hidden="true" focusable="false">
                            <path d="M0 22.6961C10.2942 67.9019 55.3488 96.1901 100.632 85.8796L191 65.3036C180.705 20.0978 135.651 -8.19013 90.3671 2.12045L0 22.6961Z"/>
                            <path d="M171 49.5C145.346 40.1383 118.688 50.1615 88.5002 51.5C43.2319 53.5072 22.8612 51.323 3.02718 24.2908"/>
                        </svg>

                        <article class="project-content" itemprop="workExample" itemscope itemtype="https://schema.org/CreativeWork">
                            <h3 class="sro"><?php echo esc_html($title); ?></h3>
                            <div class="overlay">
                                <a href="<?php echo esc_url($link); ?>"
                                   title="<?php echo esc_attr__('Discover more information about ', 'hepl-trad') .  esc_html($title); ?>"
                                   class="overlay-link"
                                   aria-label="<?php echo esc_attr__('Discover more information about ', 'hepl-trad') .  esc_html($title); ?>">
                                    <?php if ($img): ?>
                                        <?php echo wp_get_attachment_image($img['ID'], 'medium', false, [
                                            'alt' => esc_attr($img['alt'] ?: 'Project image: ' . $title),
                                            'class' => 'project-image'
                                        ]); ?>
                                    <?php endif; ?>
                                    <span class="overlay-text" itemprop="name"><?php echo esc_html($title); ?></span>
                                    <span class="overlay-bg" aria-hidden="true"></span>
                                </a>
                            </div>
                        </article>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p class="projects__empty"><?php esc_html_e("There are no projects to show.", "hepl-trad"); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <div class="see-more" role="navigation" aria-label="More works">
        <a class="btn"
           title="<?php echo esc_attr__('Discover more works', 'hepl-trad'); ?>"
           aria-label="<?php echo esc_attr__('Discover more works', 'hepl-trad'); ?>"
           href="<?php echo get_permalink(pll_get_post(13)); ?>">
            <?php echo esc_html(get_field('btn_plus')); ?>
        </a>
    </div>

</main>

<?php get_footer(); ?>
