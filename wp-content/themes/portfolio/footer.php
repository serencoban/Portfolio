</main>
<?php wp_footer(); ?>
<footer role="contentinfo" aria-label="Pied de page du site">
    <div class="footer-container">
        <h2 class="sro" aria-hidden="true">Footer</h2>
<div class="footer_top">
    <div class="left_footer">
        <p>
            <?php echo esc_html__('Let your projects', 'hepl-trad'); ?>
            <span class="flourish"><?php echo esc_html__('flourish', 'hepl-trad'); ?></span>
        </p>
    </div>
    <div class="middle_footer">
        <h3><?php echo esc_html__('Navigation', 'hepl-trad'); ?></h3>

        <?php wp_nav_menu([
            'theme_location' => '',
            'container' => false,
            'menu' => pll_current_language() === 'fr' ? 'Footer FR' : (pll_current_language() === 'en' ? 'Footer EN' : 'Footer TR'),
        ]); ?>
    </div>
    <div class="right_footer">
        <h3><?php echo esc_html__('Find me', 'hepl-trad'); ?></h3>
        <nav class="socials" aria-label="Link to my social media">
            <ul>
                <li class="insta">
                    <a href="https://www.instagram.com/sesouji/" rel="noopener noreferrer" aria-label="Instagram profil of Seren Coban" title="Go to my Instagram profil" target="_blank">
                        Instagram
                    </a>
                </li>
                <li class="linkedin">
                    <a href="https://www.linkedin.com/in/seren-coban-17b955303/" title="Go to my Linkedin profil" target="_blank">
                        Linkedin
                    </a>
                </li>
                <li class="github">
                    <a href="https://github.com/serencoban" title="Go to my Github profil" target="_blank">
                        Github
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div class="footer_bottom">
    <p><?php echo esc_html__('©2025 Seren COBAN. All right reserved. Made with love.', 'hepl-trad'); ?></p>
    <?php
    $legal_page_id = pll_get_post(263);
    $legal_url = get_permalink($legal_page_id);
    ?>
    <a href="<?= esc_url($legal_url); ?>"
       title="<?= esc_attr__('View legal information page', 'hepl-trad'); ?>">
        <?= esc_html__('Legal information', 'hepl-trad'); ?>
    </a>

</div>
</footer>
</body>
</html>
