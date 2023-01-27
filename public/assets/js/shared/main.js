$(document).ready(function () {
    onUpdate();

    $(".notifications_container .alert").delay(500).fadeIn(500);
    setTimeout(() => {
        $(".notifications_container .alert").fadeOut(500);
    }, 8000)
});

var lightSchemeIcon = document.getElementById('light-scheme-icon');
var darkSchemeIcon = document.getElementById('dark-scheme-icon');
var matcher = window.matchMedia('(prefers-color-scheme: dark)');
matcher.addListener(onUpdate);

function onUpdate() {
    if (matcher.matches) {
        lightSchemeIcon.remove();
        document.head.append(darkSchemeIcon);
    } else {
        document.head.append(lightSchemeIcon);
        darkSchemeIcon.remove();
    }
}

/** Back to Top */

var button = document.getElementById("back_to_top");
window.onscroll = () => { scrollFunction() };
/** Scroll and Sticky Header */
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        button.style.display = "block";
    } else {
        button.style.display = "none";
    }
}

function goTop() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

/** Auth Form */
//
// function openAuthModal(for_what){
//     return comingSoon;
//     // $(`.nav-tabs a[href="#auth_form_${for_what}_tab"]`).click();
//     // $(`#loginModal`).modal();
// }

