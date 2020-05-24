/*
 *  Document   : op_auth_signup.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Sign Up Page
 */

// Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
class OpAuthSignUp {
    /*
     * Init Sign Up Form Validation
     *
     */
    static initValidationSignUp() {
        jQuery('.js-validation-signup').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: (error, e) => {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: e => {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: e => {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
            rules: {
                'name': {
                    required: true,
                    minlength: 3
                },
                'username': {
                    required: true,
                    minlength: 3
                },
                'email': {
                    required: true,
                    email: true
                },
                'password': {
                    required: true,
                    minlength: 5
                },
                'password_confirmation': {
                    required: true,
                    equalTo: '#password'
                },
                'signup-terms': {
                    required: true
                }
            },
            messages: {
                'name': {
                    required: 'Please enter a name',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'username': {
                    required: 'Please enter a username',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'email': 'Please enter a valid emails address',
                'password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 8 characters long'
                },
                'password_confirmation': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 8 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                'signup-terms': 'You must agree to the service terms!'
            }
        });
    }

    /*
     * Init functionality
     *
     */
    static init() {
        this.initValidationSignUp();
    }
}

// Initialize when page loads
jQuery(() => { OpAuthSignUp.init(); });
