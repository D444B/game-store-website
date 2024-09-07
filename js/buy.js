function validate(name, regex) {
    let e = document.getElementById(name);
    if (!regex.test(e.value)) {
        e.style.backgroundColor = "pink";
    } else {
        e.style.backgroundColor="white";
    }
}