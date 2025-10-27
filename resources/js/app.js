import bootstrap from "bootstrap/dist/js/bootstrap.bundle.js";
import * as f3 from "family-chart";
import tomSelectComplete from "tom-select/src/tom-select.complete.js";
import Mark from "mark.js/src/lib/mark.js";

window.bootstrap = bootstrap;
window.f3 = f3;
window.TomSelect = tomSelectComplete;
window.Mark = Mark;

// Bootstrap tooltips
let tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]'),
);
let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
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

window.performMark = function (contentSelector, searchValueSelector) {
    const markInstance = new Mark(document.querySelector(contentSelector));
    const keywordInput = document.querySelector(searchValueSelector);

    let keyword = keywordInput.value;

    markInstance.unmark({
        done: function () {
            markInstance.mark(keyword, {});
        },
    });
};

window.fadeIn = function (selector, duration = "fast") {
    const tblContainer = document.querySelector(selector);
    let speed = 20;
    if (duration === "fast") {
        speed = 40;
    } else if (duration === "medium") {
        speed = 80;
    } else if (duration === "slow") {
        speed = 160;
    }

    let opacity = 0;
    let intervalID = setInterval(function () {
        if (opacity < 1) {
            opacity = opacity + 0.1;
            tblContainer.style.opacity = opacity;
        } else {
            clearInterval(intervalID);
        }
    }, speed);
};
