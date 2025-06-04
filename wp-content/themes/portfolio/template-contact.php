<?php /* Template Name: Page "Contact" */ ?>

<?php get_header(); ?>
<section class="header-contact">
    <div class="header_elm">
        <h2 class="title_contact">Let's get in touch</h2>
    </div>
</section>

<section class="contact">
    <div class="contact__container">
        <?php
        $errors = $_SESSION['contact_form_errors'] ?? [];
        unset($_SESSION['contact_form_errors']);
        $success = $_SESSION['contact_form_success'] ?? false;
        unset($_SESSION['contact_form_success']);

        if($success): ?>
            <div class="contact__success">
                <p><?= $success; ?></p>
            </div>
        <?php else: ?>
            <form action="<?= admin_url('admin-post.php'); ?>" method="POST" class="form">
                <fieldset class="form__fields">
                    <div class="form-text-ctn">
                        <div class="form__row">
                            <div class="form-text">
                                <p>Hello, my name is</p>
                            </div>
                            <div class="field">
                                <label for="name" class="field__label">Nom et Prénom</label>
                                <input placeholder="YOUR FULL NAME*" type="text" name="name" id="name" class="field__input">
                                <?php if(isset($errors['name'])): ?>
                                    <p class="field__error"><?= $errors['name']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form__row form__row_mail">
                            <div class="form-text">
                                <p>and here is my e-mail</p>
                            </div>
                            <div class="field">
                                <label for="email" class="field__label">Adresse mail</label>
                                <input placeholder="YOUR MAIL ADRESS*" type="email" name="email" id="email" class="field__input">
                                <?php if(isset($errors['email'])): ?>
                                    <p class="field__error"><?= $errors['email']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form__row form__row--full">
                        <div class="form-text">
                            <p>I would love to talk about :</p>
                        </div>
                        <div class="field">
                            <label for="message" class="field__label">Message</label>
                            <textarea placeholder="YOUR DESCRIPTION*" name="message" id="message" class="field__input"></textarea>
                            <?php if(isset($errors['message'])): ?>
                                <p class="field__error"><?= $errors['message']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </fieldset>
                <div class="form__submit">
                    <?php
                    // ce champ "hidden" permet à WP d'identifier la requête et de la transmettre
                    // à notre fonction définie dans functions.php via "add_action('admin_post_[nom-action]')"
                    ?>
                    <input type="hidden" name="action" value="dw_submit_contact_form">
                    <button type="submit" class="btn">Envoyer</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
