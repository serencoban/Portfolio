<?php
/* Template Name: Page "My works" */
get_header();
?>
<section class="page-header">
    <div class="header_work">
        <h2><?php the_title(); ?></h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <a href="#"><?php echo get_field('sub_title') ?></a>
        <?php endwhile; endif; ?>
    </div>
</section>
<section class="works-list">
    <div class="order_work">
        <?php
        $base_url = get_post_type_archive_link('work');
        $current_filter = $_GET['type_work'] ?? '';

        echo '<a class="filtered_item' . (empty($current_filter) ? ' active' : '') . '" href="' . esc_url($base_url) . '">' . __('All', 'hepl-trad') . '</a>';

        $terms = get_terms([
            'taxonomy' => 'type_work',
            'hide_empty' => false,
        ]);
        foreach ($terms as $term) {
            $term_url = add_query_arg('type_work', $term->slug, $base_url);
            $active = ($current_filter === $term->slug) ? ' active' : '';
            echo '<a class="filtered_item' . $active . '" href="' . esc_url($term_url) . '">' . esc_html($term->name) . '</a>';
        }
        ?>
    </div>
    <div class="works-container">
        <?php
        $args = [
            'post_type'      => 'work',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC'
        ];

        $works = new WP_Query($args);

        if ($works->have_posts()) :
            while ($works->have_posts()) : $works->the_post();

                $description = get_field('work_desc');
                $image       = get_field('work_img');
                ?>
                <article class="work-item">
                    <div class="work-text">
                        <!-- Le titre cliquable vers la page individuelle -->
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php if ($description) : ?>
                            <p><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="work-image">
                        <img class="work_flower" src="/wp-content/themes/portfolio/resources/img/flower.png" alt="">

                        <?php if ($image) : ?>
                            <figure>
                                <a href="<?php the_permalink(); ?>">
                                    <img
                                            src="<?php echo esc_url($image['sizes']['medium']); ?>"
                                            alt="<?php echo esc_attr($image['alt'] ?: 'Image of ' . get_the_title()); ?>">
                                </a>
                            </figure>
                        <?php elseif (has_post_thumbnail()) : ?>
                            <figure>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </figure>
                        <?php endif; ?>
                    </div>
                </article>
            <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>Aucun projet trouvé.</p>';
        endif;
        ?>
    </div>
</section>
<?php get_footer(); ?>
