// sticky navbar js
var navbar = document.getElementById("navbar");
var menu = document.getElementById("menu");

window.onscroll = function () {
  if (window.pageYOffset >= menu.offsetTop) {
    navbar.classList.add("sticky-top");
    navbar.style.paddingTop = "0";
    navbar.style.width = "100%";
  } else {
    navbar.classList.remove("sticky-top");
    navbar.style.paddingTop = "0px";
  }
};

// Automatic Slideshow in banner section
let slideIndex = 0;
showSlides();

function showSlides() {
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  if (slides.length === 0) {
    console.error("No slides found with the class name 'mySlides'.");
    return; // Exit the function early if there are no slides
  }

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }

  for (let i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";

  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

// Custom Switch Toggle
$(document).ready(function () {
  $("#customSwitch1").change(function () {
    // Toggle the background color class in client-section
    $(".client-section").toggleClass("custom-background-color");

    // Toggle navbar class
    $("nav").toggleClass("navbar-dark bg-transparent");

    // Toggle color class for h1
    $(".main-heading").toggleClass("font-color");

    $(".footer-section").toggleClass("footer-background");
  });
});

// Scroll-based Animation
function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", reveal);
