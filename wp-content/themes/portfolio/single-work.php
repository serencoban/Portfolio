<?php get_header(); ?>

<section class="work_header">
    <div class="work_title">
        <h2><?php the_title(); ?></h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <a href="<?php echo get_permalink(get_page_by_path('works')); ?>">Go back to other works</a>
        <?php endwhile; endif; ?>
    </div>
</section>

<section class="work-content">
    <h2 class="hidden">Work content</h2>
    <?php
    $resume_img = get_field('resume_img');
    $objectif_img = get_field('objectif_img');
    $weakness_img = get_field('weakness_img');
    ?>
    <div class="work-section">
        <div class="work-text">
            <?php if ($title = get_field('resume')) : ?>
                <h3><?php echo $title; ?></h3>
            <?php endif; ?>

            <?php if ($desc = get_field('resume_desc')) : ?>
                <p><?php echo $desc; ?></p>
            <?php endif; ?>
        </div>
        <div class="work-image">
                <?php if ($resume_img): ?>
                    <img class="my-image" src="<?php echo esc_url($resume_img['url']); ?>" alt="<?php echo esc_attr($resume_img['alt']); ?>">
                <?php endif; ?>
        </div>
    </div>

    <div class="work-section">
        <div class="work-text">
            <h3><?php echo get_field('objectif'); ?></h3>
            <p><?php echo get_field('objectif_desc'); ?></p>
        </div>
        <div class="work-image">
                <?php if ($objectif_img): ?>
                    <img class="my-image" src="<?php echo esc_url($objectif_img['url']); ?>" alt="<?php echo esc_attr($objectif_img['alt']); ?>">
                <?php endif; ?>

        </div>
    </div>

    <div class="work-section">
        <div class="work-text">
            <h3><?php echo get_field('weakness'); ?></h3>
            <p><?php echo get_field('weakness_desc'); ?></p>
        </div>
        <div class="work-image">
                <?php if ($weakness_img): ?>
                    <img class="my-image"  src="<?php echo esc_url($weakness_img['url']); ?>" alt="<?php echo esc_attr($weakness_img['alt']); ?>">
                <?php endif; ?>

        </div>
    </div>
    <?php
    $current_post_id = get_the_ID();
    $args = array(
        'post_type' => 'work',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'ASC',
        'post__not_in' => array($current_post_id),
        'date_query' => array(
            array(
                'after' => get_the_date('', $current_post_id),
                'inclusive' => false,
            ),
        ),
    );
    $next_query = new WP_Query($args);
    if ($next_query->have_posts()) :
        while ($next_query->have_posts()) : $next_query->the_post(); ?>
            <div class="other-work">
                <span>Next project</span>
                <div class="other-works-links">
                    <a class="other-work-link btn" href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    endif;
    ?>
</section>

<?php get_footer(); ?>
