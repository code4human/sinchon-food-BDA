function check_input() {
    if (!document.user_form.pass.value) {
        alert("Please fill the password form!");    
        document.user_form.pass.focus();
        return;
    }

    else if (!document.user_form.pass_confirm.value) {
        alert("Please confirm the password form!");    
        document.user_form.pass_confirm.focus();
        return;
    }

    else if (!document.user_form.nickname.value) {
        alert("Please fill the nickname form!");    
        document.user_form.nickname.focus();
        return;
    }

    if (document.user_form.pass.value != 
            document.user_form.pass_confirm.value) {
        alert("Passwords do not match.\nPlease refill!");
        document.user_form.pass.focus();
        document.user_form.pass.select();
        return;
    }

    document.user_form.submit();   // form action="modify.php"
}

function reset_form() {
    document.user_form.pass.value = "";
    document.user_form.pass_confirm.value = "";
    document.user_form.nickname.value = "";
    document.user_form.pass.focus();
    return;
}