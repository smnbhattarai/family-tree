import bootstrap from "bootstrap/dist/js/bootstrap.bundle.js";
import * as d3 from "d3";
import * as f3 from "family-chart";
import tomSelectComplete from "tom-select/src/tom-select.complete.js";
import Mark from "mark.js/src/lib/mark.js";

window.bootstrap = bootstrap;
window.f3 = f3;
window.d3 = d3;
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
            render: {
                option: function (data, escape) {
                    return `<div class="flex items-center">
                      <img alt="" src="${escape(data.image)}" width="30" height="30" style="border-radius:50%; margin-right:8px;">
                      <span>${escape(data.text)}</span>
                    </div>`;
                },
                item: function (data, escape) {
                    return `<div class="flex items-center">
                      <img alt="" src="${escape(data.image)}" width="25" height="25" style="border-radius:50%; margin-right:6px;">
                      <span>${escape(data.text)}</span>
                    </div>`;
                },
            },
            maxItems: 1,
        });
    }

    if (document.querySelector("#mother_id") != null) {
        new TomSelect("#mother_id", {
            render: {
                option: function (data, escape) {
                    return `<div class="flex items-center">
                      <img alt="" src="${escape(data.image)}" width="30" height="30" style="border-radius:50%; margin-right:8px;">
                      <span>${escape(data.text)}</span>
                    </div>`;
                },
                item: function (data, escape) {
                    return `<div class="flex items-center">
                      <img alt="" src="${escape(data.image)}" width="25" height="25" style="border-radius:50%; margin-right:6px;">
                      <span>${escape(data.text)}</span>
                    </div>`;
                },
            },
            maxItems: 1,
        });
    }

    if (document.querySelector("#spouse") != null) {
        new TomSelect("#spouse", {
            render: {
                option: function (data, escape) {
                    return `<div class="flex items-center">
                      <img alt="" src="${escape(data.image)}" width="30" height="30" style="border-radius:50%; margin-right:8px;">
                      <span>${escape(data.text)}</span>
                    </div>`;
                },
                item: function (data, escape) {
                    return `<div class="flex items-center">
                      <img alt="" src="${escape(data.image)}" width="25" height="25" style="border-radius:50%; margin-right:6px;">
                      <span>${escape(data.text)}</span>
                    </div>`;
                },
            },
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
