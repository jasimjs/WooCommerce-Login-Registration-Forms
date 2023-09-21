# WooCommerce-Login-Registration-Forms
 Custom WooCommerce Login and Registration Forms Template  This repository contains customizable templates for enhancing the user authentication experience in WooCommerce. Customize and style your login and registration forms for your WooCommerce-powered WordPress website with ease.

![Sample WooCommerce Login REgistration Page](Woocommerce%20Login%20Registration%20Page%20Example.gif)

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

   - In the provided code explanation, it mentions the use of URL parameters to toggle between the login and registration forms. URL parameters are additional pieces of information that can be appended to the end of a URL to modify or control the behavior of a web page. In this case, URL parameters are used to determine whether the login or registration form should be displayed initially. Here's how to use URL parameters in this context:
   
   - **URL Parameters in the Code Explanation:**
   In the code explanation, it mentions that the JavaScript code at the bottom of the PHP file checks URL parameters (`login` or `signup`) to determine which form to show initially. Let's break down how this works:
     1. **URL Structure:**
        - The URL of your website's "My Account" page might look like this: `https://example.com/my-account/`
     
     2. **Adding URL Parameters:**
        - To specify which form to display, you can add URL parameters to the URL. For example:
          - To display the login form initially, you can add `?login` to the URL: `https://example.com/my-account/?login`
          - To display the registration form initially, you can add `?signup` to the URL: `https://example.com/my-account/?signup`
     
     3. **JavaScript Code:**
        - The JavaScript code in the provided PHP file uses `URLSearchParams` to check for these parameters in the URL. If it finds `login`, it displays the login form; if it finds `signup`, it displays the registration form.
   
   - **How to Use URL Parameters:**
   To utilize this functionality on your website, follow these steps:
     1. **Access the "My Account" Page:**
        - Users should access the "My Account" page on your website. The URL will typically be something like `https://example.com/my-account/`.
     
     2. **Toggle Between Forms:**
        - To display the login form initially, users can simply visit the "My Account" page as is (`https://example.com/my-account/`). The JavaScript code will recognize that no parameter is specified, and it will default to displaying the login form.
        - To display the registration form initially, users can visit the "My Account" page with the `signup` parameter: `https://example.com/my-account/?signup`.
     
     3. **JavaScript Interaction:**
        - When users click on the "Don't have an account? Register here" link or any other link that triggers the JavaScript function, the code will toggle between the login and registration forms, and it will update the URL parameters accordingly.

By following these steps, users can easily switch between the login and registration forms on your WooCommerce "My Account" page by modifying the URL parameters. The JavaScript code provided in the PHP file takes care of detecting these parameters and handling the form display accordingly.

7. **Instructions for Child Theme:**
   - To use this file in a child theme, follow these steps:
     1. Create a child theme if you don't already have one. You should have a child theme directory.
     2. In your child theme directory, create a folder named `woocommerce` (if it doesn't already exist).
     3. Inside the `woocommerce` folder, create another folder named `myaccount` (if it doesn't already exist).
     4. Place this `form-login.php` file into the `myaccount` folder within your child theme directory.
     5. WordPress will automatically use the template file from your child theme instead of the parent theme.

Remember that this code is meant for WooCommerce, a WordPress plugin, and should be used within the context of a WordPress website with WooCommerce installed. It controls the layout and functionality of the login and registration forms on the "My Account" page for customers.
