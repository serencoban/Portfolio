<?php
/* Template Name: Page "My works" */
get_header();
?>
<section class="page-header">
    <div class="header_work">
        <h2><?php the_title(); ?></h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <a href="">And more to come !</a>
        <?php endwhile; endif; ?>
    </div>


</section>
    <section class="works-list">
        <?php
        $args = [
            'post_type' => 'work',
            'posts_per_page' => -1, // -1 pour tout afficher
            'orderby' => 'date',
            'order' => 'DESC'
        ];
        $works_query = new WP_Query($args);

        if ($works_query->have_posts()) :
            while ($works_query->have_posts()) : $works_query->the_post();
                ?>
                <article class="work-item">
                    <h2><?php the_title(); ?></h2>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="work-thumbnail">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="work-excerpt">
                        <?php the_excerpt(); ?>
                    </div>

                    <a href="<?php the_permalink(); ?>" class="read-more">Voir plus</a>
                </article>
            <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>Aucun projet trouvé.</p>';
        endif;
        ?>
    </section>

<?php get_footer(); ?>
