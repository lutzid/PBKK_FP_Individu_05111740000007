/*
 *  Document   : op_auth_signup.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Sign Up Page
 */

var OpAuthSignUp = function() {
    // Init Sign Up Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationSignUp = function(){
        jQuery('.js-validation-signup').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
            rules: {
                'nama': {
                    required: true,
                    minlength: 5
                },
                'ktp': {
                    required: true,
                    minlength: 16
                },
                'jenis_kelamin': {
                    required: true,
                },
                'alamat': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true
                },
                'password': {
                    required: true,
                    minlength: 5
                },
                'password-confirm': {
                    required: true,
                    equalTo: '#password'
                }
            },
            messages: {
                'nama': {
                    required: 'Mohon masukkan nama Anda',
                    minlength: 'Nama Anda minimal terdiri dari 5 karakter'
                },
                'ktp': {
                    required: 'Mohon masukkan no KTP Anda',
                    minlength: 'Masukkan no KTP valid Anda'
                },
                'jenis_kelamin': {
                    required: 'Mohon pilih jenis kelamin Anda'
                },
                'email': 'Mohon masukkan email yang valid',
                'password': {
                    required: 'Mohon masukkan password Anda',
                    minlength: 'Password Anda minimal terdiri dari 5 karakter'
                },
                'password-confirm': {
                    required: 'Mohon masukkan password Anda',
                    minlength: 'Password Anda minimal terdiri dari 5 karakter',
                    equalTo: 'Mohon masukkan password yang sama'
                },
                'terms': 'You must agree to the service terms!'
            }
        });
    };

    return {
        init: function () {
            // Init SignUp Form Validation
            initValidationSignUp();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ OpAuthSignUp.init(); });