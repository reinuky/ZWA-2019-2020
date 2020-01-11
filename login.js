var form = document.getElementById("login_form");

// function copied from seminar, adds or removes class "error"
function markAsError(id, add_remove) {
    var element = document.getElementById(id);

    if (element == null) {
        return;
    }
    if (add_remove) {
        element.classList.add("error");
    } else {
        element.classList.remove("error");
    }
}

// function copied from seminar, checks for empty item-adding form
function validate_form(e) {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    if(username.trim() == ''){
        e.preventDefault();
        markAsError("username", true);
    }
    else{
        markAsError("username", false);
    }
    if(password.trim() == ''){
        e.preventDefault();
        markAsError("password", true);   
    }
    else{
        markAsError("password", false);
    }
}

// adds event listener to submit button
form.addEventListener("submit", validate_form);
