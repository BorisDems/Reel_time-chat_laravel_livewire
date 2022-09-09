import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// $('#profil').click(function (e) {
//     e.preventDefault();

// });
console.log("sdsqdqdqs");

$(document).ready(function () {
    console.log($(".fullProfil"));
    $(".fullProfil").hide();

    // showing profil page
    $("#profil").click(function (e) {
        e.preventDefault();
        $(".fullProfil").show();
    });

    // closing profil
    $(".close").click(function (e) {
        e.preventDefault();
        $(".fullProfil").hide();
    });
});
