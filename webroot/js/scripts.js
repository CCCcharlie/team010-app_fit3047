/*!
* Start Bootstrap - Agency v7.0.12 (https://startbootstrap.com/theme/agency)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE)
*/
//
// Scripts
//

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#topNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);
})
    //  Activate Bootstrap scrollspy on the main nav element

    // gallery JS -  Copyright (c) 2023 Jaden C Bathon (https://codepen.io/InfernoHoundDEV/pen/KKaeQpX). Free for commercial use under the MIT License.
$("[id^=carousel-thumbs]").carousel({
    interval: false
});

// Added to stop the top carousel form playing.
$("[id^=carousel]").carousel({
    interval: false
});
// No longer needed.
// $(".carousel-pause").click(function () {
//     var id = $(this).attr("href");
//     if ($(this).hasClass("pause")) {
//         $(this).removeClass("pause").toggleClass("play");
//         $(this).children(".sr-only").text("Play");
//         $(id).carousel("pause");
//     } else {
//         $(this).removeClass("play").toggleClass("pause");
//         $(this).children(".sr-only").text("Pause");
//         $(id).carousel("pause");
//     }
//     $(id).carousel;
// });

// Commented out, prefer to have the icons there constantly.
// if ($("[id^=carousel-thumbs] .carousel-item").length < 50) {
//     $("#carousel-thumbs [class^=carousel-control-]").remove();
//     $("#carousel-thumbs").css("padding", "0 5px");
// }


// Moves the bottom carosouel alongside the top images.)
// Commented Out, bottom carousel removed as issues exceed iteration 1 capacities.
// $("#carousel").on("slide.bs.carousel", function (e) {
//     var id = parseInt($(e.relatedTarget).attr("data-slide-number"));
//     var thumbNum = parseInt(
//         $("[id=carousel-selector-" + id + "]")
//             .parent()
//             .parent()
//             .attr("data-slide-number")
//     );
//     $("[id^=carousel-selector-]").removeClass("selected");
//     $("[id=carousel-selector-" + id + "]").addClass("selected");
//     $("#carousel-thumbs").carousel(thumbNum);
// });
