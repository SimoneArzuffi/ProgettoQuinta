function myFunction() {
    var x = document.getElementsByName("password")[0];
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}