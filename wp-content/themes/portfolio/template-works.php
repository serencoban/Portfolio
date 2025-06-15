<?php
/* Template Name: Page "My works" */
get_header();
?>
<section class="page-header">
    <div class="header_work">
        <h2 role="heading"><?php the_title(); ?></h2>
        <p><?php echo esc_html(get_field('sub_title')); ?></p>

    </div>
</section>
<section class="works-list">
    <h3 class="sro"><?php esc_html_e('My works', 'hepl-trad'); ?></h3>
    <div class="order_work" aria-label="<?php esc_attr_e('Filter projects by type', 'hepl-trad'); ?>">
        <?php
        $base_url = get_post_type_archive_link('work');
        $current_filter = $_GET['type_work'] ?? '';
        $page_url = get_permalink();

        // Lien "All"
        $all_label = esc_html__('All', 'hepl-trad');
        echo '<a class="filtered_item' . (empty($current_filter) ? ' active' : '') . '"
             href="' . esc_url($page_url) . '" 
             title="' . esc_attr__('Filter projects by All', 'hepl-trad') . '"
             aria-label="' . esc_attr($all_label) . '">'
            . $all_label .
            '</a>';
        $terms = get_terms([
            'taxonomy'   => 'type_work',
            'hide_empty' => false,
        ]);

        foreach ($terms as $term) {
            $term_url   = add_query_arg('type_work', $term->slug, $page_url);
            $active     = ($current_filter === $term->slug) ? ' active' : '';
            $term_name  = esc_html($term->name);

            echo '<a class="filtered_item' . esc_attr($active) . '" 
                 href="' . esc_url($term_url) . '" 
                 aria-label="' . esc_attr($term_name) . '"
                 title="' . esc_attr__('Filter projects by ', 'hepl-trad') . $term_name . '">'
                . $term_name .
                '</a>';
        }
        ?>
    </div>
    <div class="works-container">
        <?php
        $args = [
            'post_type'      => 'work',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ];
        if (!empty($current_filter)) {
            $args['tax_query'] = [[
                'taxonomy' => 'type_work',
                'field'    => 'slug',
                'terms'    => $current_filter,
            ]];
        }
        $works = new WP_Query($args);
        if ($works->have_posts()) :
            while ($works->have_posts()) : $works->the_post();
                $description = get_field('work_desc');
                $image       = get_field('work_img');
                ?>
                <article class="work-item" tabindex="0" role="region" aria-labelledby="work-title-<?php the_ID(); ?>" aria-describedby="work-desc-<?php the_ID(); ?>">
                    <div class="work-text">
                        <h3 id="work-title-<?php the_ID(); ?>"><?php the_title(); ?></h3>
                        <?php if ($description) : ?>
                            <p id="work-desc-<?php the_ID(); ?>"><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="work-image" itemprop="workExample">
                        <img class="work_flower"
                             src="<?php echo get_template_directory_uri(); ?>/resources/img/flower.png"
                             alt="<?php esc_attr_e('Decorative flower', 'hepl-trad'); ?>">
                        <?php $project_title = get_the_title(); ?>
                        <?php if ($image) : ?>
                            <figure>
                                <a href="<?php the_permalink(); ?>"
                                   title="<?php echo esc_attr(sprintf(__('View project details about %s', 'hepl-trad'), $project_title)); ?>">
                                    <?php
                                    echo wp_get_attachment_image($image['ID'], 'medium', false, [
                                        'alt'   => esc_attr($image['alt'] ?: sprintf(__('Image of ', 'hepl-trad'), $project_title)),
                                        'class' => 'project-image'
                                    ]);
                                    ?>
                                </a>
                            </figure>
                        <?php elseif (has_post_thumbnail()) : ?>
                            <figure>
                                <a href="<?php the_permalink(); ?>"
                                   title="<?php echo esc_attr(sprintf(__('View project details about %s', 'hepl-trad'), $project_title)); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </figure>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endwhile;
            wp_reset_postdata();
        else :
            echo '<p>' . esc_html__('No projects found.', 'hepl-trad') . '</p>';
        endif;
        ?>
    </div>
</section>
<?php get_footer(); ?>
