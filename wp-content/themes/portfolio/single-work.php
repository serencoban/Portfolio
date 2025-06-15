<?php get_header(); ?>
<section class="work_header">
    <div class="work_title">
        <h2 itemprop="headline"><?php the_title(); ?></h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <a class="back-btn"
               href="<?php echo get_permalink(get_page_by_path('works')); ?>"
               title="<?php echo esc_attr__('Go back to other works', 'hepl-trad'); ?>">
                <?php echo esc_html__(' ← Go back to other works', 'hepl-trad'); ?>
            </a>
        <?php endwhile; endif; ?>
        <div>
            <a href="<?php echo get_field('link'); ?>"
               class="btn"
               title="<?php echo esc_attr__('Discover more about this project', 'hepl-trad'); ?>">
                <?php echo esc_html__('See the project', 'hepl-trad'); ?>
            </a>
        </div>
    </div>
</section>
<section class="work-content" itemscope itemtype="https://schema.org/CreativeWork">
    <h2 class="sro"><?php echo esc_html__('Work content', 'hepl-trad'); ?></h2>
    <?php
    $resume_img    = get_field('resume_img');
    $objectif_img  = get_field('objectif_img');
    $weakness_img  = get_field('weakness_img');
    ?>
    <meta itemprop="name" content="<?php the_title(); ?>">
    <div class="work-section resume">
        <div class="work-text">
            <?php if ($title = get_field('resume')) : ?>
                <h3 itemprop="abstract"><?php echo esc_html($title); ?></h3>
            <?php endif; ?>
            <?php if ($desc = get_field('resume_desc')) : ?>
                <p itemprop="description"><?php echo esc_html($desc); ?></p>
            <?php endif; ?>
        </div>
        <div class="work-image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
            <?php if ($resume_img): ?>
                <img class="my-image"
                     src="<?php echo esc_url($resume_img['url']); ?>"
                     alt="<?php echo esc_attr($resume_img['alt']); ?>"
                  >
            <?php endif; ?>
        </div>
    </div>
    <div class="work-section objectif">
        <div class="work-text">
            <h3 itemprop="about"><?php echo esc_html(get_field('objectif')); ?></h3>
            <p itemprop="text"><?php echo esc_html(get_field('objectif_desc')); ?></p>
        </div>
        <div class="work-image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
            <?php if ($objectif_img): ?>
                <img class="my-image"
                     src="<?php echo esc_url($objectif_img['url']); ?>"
                     alt="<?php echo esc_attr($objectif_img['alt']); ?>"
                >
            <?php endif; ?>
        </div>
    </div>
    <div class="work-section weakness">
        <div class="work-text">
            <h3 itemprop="keywords"><?php echo esc_html(get_field('weakness')); ?></h3>
            <p itemprop="text"><?php echo esc_html(get_field('weakness_desc')); ?></p>
        </div>
        <div class="work-image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
            <?php if ($weakness_img): ?>
                <img class="my-image"
                     src="<?php echo esc_url($weakness_img['url']); ?>"
                     alt="<?php echo esc_attr($weakness_img['alt']); ?>"
                >
            <?php endif; ?>
        </div>
    </div>
    <?php
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    if ($prev_post || $next_post): ?>
        <div class="other-work" itemprop="isPartOf" itemscope itemtype="https://schema.org/CollectionPage">
            <h2><?php echo esc_html__('Other projects', 'hepl-trad'); ?></h2>
            <div class="other-works-links">
                <?php if ($prev_post): ?>
                    <a class="other-work-link btn"
                       href="<?php echo get_permalink($prev_post); ?>"
                       itemprop="relatedLink"
                       title="<?php echo esc_attr(sprintf(__('Discover %s', 'hepl-trad'), get_the_title($prev_post))); ?>">
                        ← <?php echo get_the_title($prev_post); ?>
                    </a>
                <?php endif; ?>
                <?php if ($next_post): ?>
                    <a class="other-work-link btn"
                       href="<?php echo get_permalink($next_post); ?>"
                       itemprop="relatedLink"
                       title="<?php echo esc_attr(sprintf(__('Discover %s', 'hepl-trad'), get_the_title($next_post))); ?>">
                        <?php echo get_the_title($next_post); ?> →
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>
