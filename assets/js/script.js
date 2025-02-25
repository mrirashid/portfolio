document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("contact-form").addEventListener("submit", function (e) {
        e.preventDefault();

        var form = this;
        var formData = new FormData(form);
        var messageBox = document.getElementById("form-message");

        fetch(form.action, {
            method: "POST",
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === "success") {
                messageBox.innerHTML = "<p style='color: green;'>Your message has been sent successfully!</p>";
                form.reset();
            } else {
                messageBox.innerHTML = "<p style='color: red;'>There was an error sending your message. Please try again.</p>";
            }
        })
        .catch(error => {
            messageBox.innerHTML = "<p style='color: red;'>Something went wrong. Please try again later.</p>";
        });
    });
});
