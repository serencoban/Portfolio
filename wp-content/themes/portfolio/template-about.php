<?php
/* Template Name: Page "About me" */
get_header();
?>

<section class="description-section">
    <div class="container">
        <div class="description-content">
            <img
                    src="<?php echo esc_url(get_template_directory_uri()); ?>/resources/img/flower.png"
                    alt="<?php echo esc_attr__('Lily Flower', 'portfolio'); ?>"
                    class="description-image"
            />
            <div class="description-text-group">
                <h2 class="section-title">
                    <?php the_title(); ?>
                </h2>
                <p class="description-text">
                    <?php echo esc_html__('Seren Coban, I am passionate about creating innovative and visually appealing digital experiences. Let me help your projects flourish by designing warm, engaging, and user-friendly interfaces that truly connect with people.', 'your-textdomain'); ?>
                </p>
            </div>
        </div>
    </div>
</section>


<section class="studies-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html__('My Studies', 'portfolio'); ?></h2>
        <ul class="studies-timeline">
            <li>
                <div class="svg-wrapper">
                    <svg class="petal-about" xmlns="http://www.w3.org/2000/svg" width="91" height="42" viewBox="0 0 91 42" fill="none">
                        <path d="M0 10.8322C4.90455 32.4077 26.3704 45.9089 47.9452 40.988L91 31.1676C86.095 9.59214 64.6296 -3.90893 43.0545 1.01203L0 10.8322Z" fill="#898962"/>
                        <path d="M81.4712 23.625C69.2487 19.1569 56.5475 23.9407 42.165 24.5795C20.5974 25.5375 10.892 24.495 1.44225 11.5933" stroke="#EAE8C6" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="placement">
                    <time datetime="2016">2016</time>
                    <div class="studies">
                        <p>Economics and Foreign Languages</p>
                        <p>Athénée Royal de Herstal</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="svg-wrapper">
                    <svg class="petal-about"  xmlns="http://www.w3.org/2000/svg" width="91" height="42" viewBox="0 0 91 42" fill="none">
                        <path d="M0 10.8322C4.90455 32.4077 26.3704 45.9089 47.9452 40.988L91 31.1676C86.095 9.59214 64.6296 -3.90893 43.0545 1.01203L0 10.8322Z" fill="#898962"/>
                        <path d="M81.4712 23.625C69.2487 19.1569 56.5475 23.9407 42.165 24.5795C20.5974 25.5375 10.892 24.495 1.44225 11.5933" stroke="#EAE8C6" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="placement">
                    <time datetime="2022">2022</time>
                    <div class="studies">
                        <p>Architecture</p>
                        <p>University of Liège</p>
                    </div>
                </div>
            </li>
            <li>
                <div  class="svg-wrapper">
                    <svg class="petal-about"  xmlns="http://www.w3.org/2000/svg" width="91" height="42" viewBox="0 0 91 42" fill="none">
                        <path d="M0 10.8322C4.90455 32.4077 26.3704 45.9089 47.9452 40.988L91 31.1676C86.095 9.59214 64.6296 -3.90893 43.0545 1.01203L0 10.8322Z" fill="#898962"/>
                        <path d="M81.4712 23.625C69.2487 19.1569 56.5475 23.9407 42.165 24.5795C20.5974 25.5375 10.892 24.495 1.44225 11.5933" stroke="#EAE8C6" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="placement">
                    <time datetime="2023">2023</time>
                    <div class="studies">
                        <p>Web development and design</p>
                        <p>Haute École de la Province de Liège</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>

<section class="skills-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html__('My Skills', 'portfolio'); ?></h2>
        <div class="skills-grid">
            <?php
            $skills = [
                'Front-end' => ['HTML', 'CSS/SCSS', 'JavaScript', 'React'],
                'Back-end'  => ['PHP', 'MySQL', 'Node.js'],
                'Design'    => ['Figma', 'Adobe XD', 'Photoshop'],
                'Others'    => ['Git', 'WordPress', 'SEO']
            ];
            foreach ($skills as $category => $items): ?>
                <div class="skill-card">
                    <h3 class="skill-title"><?php echo esc_html($category); ?></h3>
                    <ul class="skill-list">
                        <?php foreach ($items as $skill): ?>
                            <li><?php echo esc_html($skill); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
