# WooCommerce-Login-Registration-Forms
 Custom WooCommerce Login and Registration Forms Template  This repository contains customizable templates for enhancing the user authentication experience in WooCommerce. Customize and style your login and registration forms for your WooCommerce-powered WordPress website with ease.


This code appears to be a PHP template file for displaying the login and registration forms in a WooCommerce-powered website. It is intended to be used within a WordPress theme. Let me explain each part of the code and then provide instructions on how to use it in a child theme.

1. **File Description and WordPress Check:**
   - This PHP file is a template for displaying the login and registration forms in WooCommerce.
   - It checks whether it's being accessed directly using `if (!defined('ABSPATH'))` and exits if it is. This is a common security practice to prevent direct access to template files.

2. **Action Hook:**
   - It uses the `do_action('woocommerce_before_customer_login_form')` hook to allow other functions or plugins to add content before the login form.

3. **Registration Check:**
   - It checks if user registration is enabled in WooCommerce settings using `$registration_enabled`. If registration is enabled, it will display a registration form as well.

4. **Login Form:**
   - The login form is wrapped in a `<div>` with the class `login-form`.
   - It includes fields for the username or email and password, along with a "Remember me" checkbox and a "Lost your password?" link.
   - WordPress nonce fields are added for security.
   - It uses various WooCommerce actions (`woocommerce_login_form_start`, `woocommerce_login_form`, `woocommerce_login_form_end`) to allow for customization.

5. **Registration Form (if enabled):**
   - If user registration is enabled, it includes a registration form within a `<div>` with the class `registration-form`.
   - This form includes fields for username (if not auto-generated), email, and password.
   - Similar to the login form, it uses WooCommerce actions for customization.

6. **Toggle Between Login and Registration Forms:**
   - It includes JavaScript (jQuery) code at the bottom to toggle between the login and registration forms when a link is clicked. It checks URL parameters (`login` or `signup`) to determine which form to show initially.

7. **Instructions for Child Theme:**
   - To use this file in a child theme, follow these steps:
     1. Create a child theme if you don't already have one. You should have a child theme directory.
     2. In your child theme directory, create a folder named `woocommerce` (if it doesn't already exist).
     3. Inside the `woocommerce` folder, create another folder named `myaccount` (if it doesn't already exist).
     4. Place this `form-login.php` file into the `myaccount` folder within your child theme directory.
     5. WordPress will automatically use the template file from your child theme instead of the parent theme.

Remember that this code is meant for WooCommerce, a WordPress plugin, and should be used within the context of a WordPress website with WooCommerce installed. It controls the layout and functionality of the login and registration forms on the "My Account" page for customers.
