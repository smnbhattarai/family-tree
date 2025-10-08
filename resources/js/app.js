import bootstrap from "bootstrap/dist/js/bootstrap.bundle.js";

window.bootstrap = bootstrap;

// Bootstrap tooltips
var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]'),
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Bootstrap Toast
document.addEventListener("DOMContentLoaded", function () {
    var toastLiveExample = document.getElementById("liveToast");
    if (toastLiveExample != null) {
        var toast = new bootstrap.Toast(toastLiveExample);
        toast.show();
    }
});
