function Validate() {
    var regexp = new RegExp("^http(s?)\:\/\/[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*(:(0-9)*)*(\/?)([a-zA-Z0-9\-\.\?\,\'\/\\\+&amp;%\$#_]*)?$");
    var url = document.getElementById("url").value;
    if (!regexp.test(url)) {
        alert("Not valid Url!");
    }
}

function checkForm(form) {
    if (form.title.value == "") {
        alert("Error: Title cannot be blank!");
        form.title.focus();
        return false;
    }

    re = /^\w+$ /;
    if (!re.test(form.title.value)) {
        alert("Error: Title must contain only letters, numbers and underscores!");
        form.title.focus();
        return false;
    }
    if (form.API_Compatibility.value == "") {

        alert("Error: Should select Api compatibility!");
        form.API_Compatibility.focus();
        return false;
    }
    if (form.category.value == "") {
        alert("Error: Category cannot be blank!");
        form.category.focus();
        return false;
    }/**
    re = /^\w+$/;
    if (!re.test(form.category.value)) {
        alert("Error: Category must contain only letters, numbers and underscores!");
        form.category.focus();
        return false;
    }**/
    if (form.author.value == "") {
        alert("Error: Author's name cannot be blank!");
        form.author.focus();
        return false;
    }
    re = /^\w+$/;
    if (!re.test(form.author.value)) {
        alert("Error: Author's name must contain only letters, numbers and underscores!");
        form.author.focus();
        return false;
    }
}