let textarea = document.getElementById("ndc-message");

textarea.addEventListener("input", function () {
    let form = document.getElementById("ndc-form");

    //Disable the button when the value is empty
    form.querySelector('button[type="submit"]').disabled = textarea.value.trim().length === 0;
});
