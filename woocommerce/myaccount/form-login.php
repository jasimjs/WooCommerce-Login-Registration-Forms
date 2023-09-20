<?php
/**
 * Template for displaying the login form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * @package WooCommerce\Templates
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' );
?>

<?php
// Check if registration is enabled.
$registration_enabled = get_option('woocommerce_enable_myaccount_registration') === 'yes';
?>

<div class="login-register-forms">
  <div class="login-form">
    <h2><?php esc_html_e('Login', 'woocommerce'); ?></h2>

    <form class="woocommerce-form woocommerce-form-login login" method="post">

      <?php do_action('woocommerce_login_form_start'); ?>

      <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="username"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" />
      </p>
      <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
        <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
      </p>

      <?php do_action('woocommerce_login_form'); ?>

      <p class="form-row">
        <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
        <button type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
          <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
        </label>
      </p>
      <p class="woocommerce-LostPassword lost_password">
        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
      </p>

      <?php do_action('woocommerce_login_form_end'); ?>

    </form>
  </div>

  <?php if ($registration_enabled) : ?>

    <div class="registration-form" style="display: none;">
      <h2><?php esc_html_e('Register', 'woocommerce'); ?></h2>

      <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

        <?php do_action('woocommerce_register_form_start'); ?>

        <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php if (!empty($_POST['username'])) esc_attr_e($_POST['username']); ?>" />
          </p>

        <?php endif; ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
          <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
          <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php if (!empty($_POST['email'])) esc_attr_e($_POST['email']); ?>" />
        </p>

        <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
          </p>

        <?php endif; ?>

        <?php do_action('woocommerce_register_form'); ?>

        <p class="woocommerce-FormRow form-row">
          <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
          <button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
        </p>

        <?php do_action('woocommerce_register_form_end'); ?>

      </form>
    </div>

  <?php endif; ?>

</div>

<p class="login-register-switch">
  <?php if ($registration_enabled) : ?>
    <a href="#" class="switch-form-link"><?php esc_html_e('Don\'t have an account? Register here', 'woocommerce'); ?></a>
  <?php else : ?>
    <?php esc_html_e('Registration is disabled', 'woocommerce'); ?>
  <?php endif; ?>
</p>

<!-- OLD SCRIPT ONLY SWITCH
  <script>
  jQuery(document).ready(function($) {
    $('.switch-form-link').on('click', function(e) {
      e.preventDefault();
      $('.login-form, .registration-form').toggle();
      var linkText = $('.switch-form-link').text();
      var newLinkText = linkText === 'Don\'t have an account? Register here' ? 'Already have an account? Login here' : 'Don\'t have an account? Register here';
      $('.switch-form-link').text(newLinkText);
    });
  });
</script> -->

<script>
  jQuery(document).ready(function($) {
    // Check the URL parameter and toggle the form accordingly
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('login')) {
      $('.login-form').show();
      $('.registration-form').hide();
      $('.switch-form-link').text("Don't have an account? Register here");
    } else if (urlParams.has('signup')) {
      $('.login-form').hide();
      $('.registration-form').show();
      $('.switch-form-link').text('Already have an account? Login here');
    }

    // Toggle the forms when the link is clicked
    $('.switch-form-link').on('click', function(e) {
      e.preventDefault();
      $('.login-form, .registration-form').toggle();
      var linkText = $('.switch-form-link').text();
      var newLinkText = linkText === 'Don\'t have an account? Register here' ? 'Already have an account? Login here' : 'Don\'t have an account? Register here';
      $('.switch-form-link').text(newLinkText);
    });
  });
</script>