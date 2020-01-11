var form = document.getElementById("add_form");

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

// function copied from seminar, checks for empty form submissions
function validate_item(e){
    var item = document.getElementById("add_item_js").value;
    if(item.trim() == ''){
        e.preventDefault();
        markAsError("add_item_js", true);
    }
    else{
        markAsError("add_item_js", false);
    }
}
// adding event listener to submit button for validation
form.addEventListener("submit", validate_item);