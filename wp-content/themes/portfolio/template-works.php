<?php
/* Template Name: Page "My works" */
get_header();
?>
<section class="page-header">
    <div class="header_work">
        <h2 role="heading"><?php the_title(); ?></h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <a href="#"><?php echo get_field('sub_title') ?></a>
        <?php endwhile; endif; ?>
    </div>
</section>
<section class="works-list">
    <div class="order_work" aria-label="Filtrer les projets par type">
            <?php
            $base_url = get_post_type_archive_link('work');
            $current_filter = $_GET['type_work'] ?? '';
            $page_url = get_permalink();

            echo '<a class="filtered_item' . (empty($current_filter) ? ' active' : '') . '" href="' . esc_url($page_url) . '">' . __('All', 'hepl-trad') . '</a>';

            $terms = get_terms([
                'taxonomy' => 'type_work',
                'hide_empty' => false,
            ]);
        foreach ($terms as $term) {
            $term_url = add_query_arg('type_work', $term->slug, $page_url);
            $active = ($current_filter === $term->slug) ? ' active' : '';
            // Aria-label personnalisé pour chaque filtre
            $aria_label = sprintf(__('Afficher les projets %s', 'hepl-trad'), $term->name);
            echo '<a class="filtered_item' . $active . '" href="' . esc_url($term_url) . '" aria-label="' . esc_attr($aria_label) . '">' . esc_html($term->name) . '</a>';
        }

        ?>
    </div>
    <div class="works-container">
        <?php
        $current_filter = $_GET['type_work'] ?? '';

        $args = [
            'post_type'      => 'work',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ];

        if (!empty($current_filter)) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'type_work',
                    'field'    => 'slug',
                    'terms'    => $current_filter,
                ]
            ];
        }

        $works = new WP_Query($args);

        if ($works->have_posts()) :
            while ($works->have_posts()) : $works->the_post();

                $description = get_field('work_desc');
                $image       = get_field('work_img');
                ?>
                <article class="work-item" tabindex="0" aria-labelledby="work-title-<?php the_ID(); ?>" role="region" aria-describedby="work-desc-<?php the_ID(); ?>">
                    <div class="work-text">
                        <h3><?php the_title(); ?></a></h3>
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
                                            src="<?php echo esc_url($image['url']); ?>"
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
