function check_input() {
    if (!document.review_form.title.value)
    {
        alert("Please fill the title form!");
        document.review_form.title.focus();
        return;
    }
    else if (!document.review_form.content.value)
    {
        alert("Please fill the content form!");    
        document.review_form.content.focus();
        return;
    }
    else if (!document.review_form.grade.value)
    {
        alert("Please fill the grade form!");    
        document.review_form.grade.focus();
        return;
    }
    document.review_form.submit();
}