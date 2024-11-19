//notify alert cart
document.addEventListener("DOMContentLoaded", function() {
    const alertBoxes = document.querySelectorAll(".alert-message");
    alertBoxes.forEach(alertBox => {
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 5000);
    });
});
