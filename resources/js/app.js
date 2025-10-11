import bootstrap from "bootstrap/dist/js/bootstrap.bundle.js";
import * as f3 from "family-chart";
import tomSelectComplete from "tom-select/src/tom-select.complete.js";

window.bootstrap = bootstrap;
window.f3 = f3;
window.TomSelect = tomSelectComplete;

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

document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelector("#father_id") != null) {
        new TomSelect("#father_id", {
            allowEmptyOption: true,
            create: true,
        });
    }

    if (document.querySelector("#mother_id") != null) {
        new TomSelect("#mother_id", {
            allowEmptyOption: true,
            create: true,
        });
    }

    if (document.querySelector("#spouse") != null) {
        new TomSelect("#spouse", {
            maxItems: 5,
        });
    }
});
