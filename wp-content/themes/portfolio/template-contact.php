<?php /* Template Name: Page "Contact" */ ?>
<?php get_header(); ?>
<section class="header-contact">
    <div class="contact__wrapper">
        <div class="contact-title-ctn">
            <h2 role="heading" class="title_contact"><?php esc_html_e('Let’s get in touch !', 'hepl-trad'); ?></h2>
        </div>
    </div>
</section>
<section class="contact">
    <h3 class="sro"><?php esc_html_e('Contact me', 'hepl-trad'); ?></h3>
    <div class="contact__wrapper">
    <div class="contact__container">
        <?php
        $errors = $_SESSION['contact_form_errors'] ?? [];
        unset($_SESSION['contact_form_errors']);
        $success = $_SESSION['contact_form_success'] ?? false;
        unset($_SESSION['contact_form_success']);
        $old = $_SESSION['contact_form_old'] ?? [];
        unset($_SESSION['contact_form_old']);
        if($success): ?>
            <div class="contact__success">
                <p><?= esc_html($success); ?></p>
            </div>
        <?php else: ?>
        <p class="require_field"><?php echo get_field('required'); ?></p>
            <form action="<?= admin_url('admin-post.php'); ?>" method="post" class="form" novalidate="">
                <fieldset class="form__fields">
                    <legend class="sro"><?php esc_html_e('Contact form', 'hepl-trad'); ?></legend>
                    <div class="form-text-ctn">
                        <div class="form__row">
                            <div class="form-text">
                                <p><?php esc_html_e('Hello, my name is', 'hepl-trad'); ?></p>
                            </div>
                            <div class="field">
                                <label for="name" class="field__label">
                                    <?php esc_html_e('Full name', 'hepl-trad'); ?>
                                </label>
                                <span data-name="fullname">
                            <input
                                    placeholder="<?= esc_attr__('Your full name*', 'hepl-trad'); ?>"
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="field__input"
                                    aria-required="true"
                                    value="<?= esc_attr($old['name'] ?? '') ?>"
                            >
                        </span>
                                <?php if (isset($errors['name'])): ?>
                                    <p class="field__error"><?= esc_html($errors['name']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form__row form__row_mail">
                            <div class="form-text">
                                <p><?php esc_html_e('And here is my e-mail', 'hepl-trad'); ?></p>
                            </div>
                            <div class="field">
                                <label for="email" class="field__label">
                                    <?php esc_html_e('Email address', 'hepl-trad'); ?>
                                </label>
                                <span data-name="email">
                            <input
                                    placeholder="<?= esc_attr__('Your email address*', 'hepl-trad'); ?>"
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="field__input"
                                    aria-required="true"
                                    value="<?= esc_attr($old['email'] ?? '') ?>"
                            >
                        </span>
                                <?php if (isset($errors['email'])): ?>
                                    <p class="field__error"><?= esc_html($errors['email']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form__row form__row--full">
                        <div class="form-text">
                            <p><?php esc_html_e('I would love to talk about:', 'hepl-trad'); ?></p>
                        </div>
                        <div class="field">
                            <label for="message" class="field__label">
                                <?php esc_html_e('Message', 'hepl-trad'); ?>
                            </label>
                            <span data-name="message">
                        <textarea
                                placeholder="<?= esc_attr__('Your message*', 'hepl-trad'); ?>"
                                name="message"
                                id="message"
                                class="field__input"
                                aria-required="true"
                                cols="30"
                                rows="10"
                        ><?= esc_textarea($old['message'] ?? '') ?></textarea>
                    </span>
                            <?php if (isset($errors['message'])): ?>
                                <p class="field__error"><?= esc_html($errors['message']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </fieldset>
                <div class="form__submit">
                    <input type="hidden" name="action" value="dw_submit_contact_form">
                    <button class="btn" type="submit">
                        <?php esc_html_e('Send', 'hepl-trad'); ?>
                    </button>
                </div>
            </form>
        <?php endif; ?>
    </div>
    </div>
</section>
<?php get_footer(); ?>
