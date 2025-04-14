const slides = document.querySelectorAll(".slide");
const dotsContainer = document.getElementById("dots");
let currentIndex = 0;

function showSlide(index) {
  const slidesEl = document.getElementById("slides");
  slidesEl.style.transform = `translateX(-${index * 100}%)`;
  updateDots(index);
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % slides.length;
  showSlide(currentIndex);
}

function prevSlide() {
  currentIndex = (currentIndex - 1 + slides.length) % slides.length;
  showSlide(currentIndex);
}

function updateDots(index) {
  document.querySelectorAll(".dot").forEach((dot, i) => {
    dot.classList.toggle("active", i === index);
  });
}

// Create dots
slides.forEach((_, i) => {
  const dot = document.createElement("span");
  dot.classList.add("dot");
  dot.addEventListener("click", () => {
    currentIndex = i;
    showSlide(i);
  });
  dotsContainer.appendChild(dot);
});

showSlide(currentIndex);
setInterval(nextSlide, 5000); // auto-slide every 5 seconds

function slideAstrologers(direction) {
  const slider = document.getElementById("astroSlider");
  const scrollAmount = 240; // little more than card + gap

  if (!slider) {
    console.error("AstroSlider element not found!");
    return;
  }

  if (direction === "left") {
    slider.scrollLeft -= scrollAmount;
  } else {
    slider.scrollLeft += scrollAmount;
  }

  console.log("Slider position:", slider.scrollLeft);
}

const accordionButtons = document.querySelectorAll('.accordion-btn');

accordionButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    const item = btn.parentElement;
    item.classList.toggle('active');

    // Collapse other items
    document.querySelectorAll('.accordion-item').forEach(i => {
      if (i !== item) i.classList.remove('active');
    });
  });
});


document.addEventListener('DOMContentLoaded', function() {
  const toggleButton = document.getElementById('toggleButton');
  const menu = document.getElementById('menu');

  toggleButton.addEventListener('click', function() {
      menu.classList.toggle('hidden');
  });

  // Close the menu when clicking outside of it
  document.addEventListener('click', function(event) {
      if (!event.target.closest('#toggleButton, #menu')) {
          menu.classList.add('hidden');
      }
  });
});

 const authContainer = document.getElementById('authContainer');
    const authRegisterBtn = document.getElementById('authRegisterBtn');
    const authLoginBtn = document.getElementById('authLoginBtn');

    authRegisterBtn.addEventListener('click', () => {
      authContainer.classList.add('active');
    });

    authLoginBtn.addEventListener('click', () => {
      authContainer.classList.remove('active');
    });
