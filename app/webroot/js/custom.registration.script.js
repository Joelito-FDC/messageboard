$(document).ready(function() {
    if($('#UserRegistrationForm').length) {
        $('#UserRegistrationForm').on('submit', function(e) {
            let userName = $('#UserName');
            let userEmail = $('#UserEmail');
            let userPassword = $('#UserPassword');
            let userConfirmPassword = $('#UserConfirmPassword');
            let infoStatus = $('#registration-info-status');
    
            if(userName.val().length < 5 || userName.val().length > 20) {
                infoStatus.html(`<div class="alert alert-warning" role="alert">Name should be 5 to 20 characters.</div>`);
                e.preventDefault();
            } 
            
            if(userPassword.val() != userConfirmPassword.val()) {
                infoStatus.html(`<div class="alert alert-warning" role="alert">Password did not match.</div>`);
                e.preventDefault();
            } 
        });
    }
});