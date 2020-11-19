function check_input() {
    if (!document.login_form.email.value) {
        alert("Please fill the email form!");
        document.login_form.email.focus();
        return;
    }

    if (!document.login_form.pass.value) {
        alert("Please fill the password form!");
        document.login_form.pass.focus();
        return;
    }
    
    document.login_form.submit();   // form action="signin_user.php"
}