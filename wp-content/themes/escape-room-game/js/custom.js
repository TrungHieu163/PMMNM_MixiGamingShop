jQuery(document).ready(function() {
  jQuery('.owl-carousel').owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    navText: ["<span class='left-btn p-3'></span>", "<span class='right-btn p-3'></span>"], 
    dots: false,
    rtl: false,
    responsive: {
    0: {  
      items: 1 
    },
    768: { 
      items: 2 
    },
    992: { 
      items: 2 
    },
    1200: { 
      items: 3 
    }
  },
  autoplay: true,
  });
});

// Scroll to Top
window.onscroll = function() {
  const escape_room_game_button = document.querySelector('.scroll-top-box');
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    escape_room_game_button.style.display = "block";
  } else {
    escape_room_game_button.style.display = "none";
  }
};

document.querySelector('.scroll-top-box a').onclick = function(event) {
  event.preventDefault();
  window.scrollTo({top: 0, behavior: 'smooth'});
};

// Line js
const escape_room_game_path = document.querySelector(".icon-container svg path");
const escape_room_game_dots = document.querySelectorAll(".icon-container svg circle");

if (escape_room_game_path && escape_room_game_dots.length > 0) {
  const escape_room_game_pathLength = escape_room_game_path.getTotalLength();
  let escape_room_game_targetPercent = 0;
  let escape_room_game_currentPercent = 0;

  window.addEventListener("scroll", () => {
    escape_room_game_targetPercent = window.scrollY / (document.body.scrollHeight - window.innerHeight);
    escape_room_game_targetPercent = Math.min(Math.max(escape_room_game_targetPercent, 0), 1); // clamp between 0 and 1
  });

  function escape_room_game_animate() {
    const escape_room_game_ease = 0.01; 
    escape_room_game_currentPercent += (escape_room_game_targetPercent - escape_room_game_currentPercent) * escape_room_game_ease;
    escape_room_game_currentPercent = Math.min(Math.max(escape_room_game_currentPercent, 0), 1);

    const escape_room_game_point = escape_room_game_path.getPointAtLength(escape_room_game_currentPercent * escape_room_game_pathLength);

    escape_room_game_dots.forEach(dot => {
      dot.setAttribute("cx", escape_room_game_point.x);
      dot.setAttribute("cy", escape_room_game_point.y);
    });
    requestAnimationFrame(escape_room_game_animate);
  }
  escape_room_game_animate();
}

// Faq
document.addEventListener("DOMContentLoaded", function () {
  const escape_room_game_details = document.querySelectorAll(".faq-btm-title");

  escape_room_game_details.forEach((targetDetail) => {
    targetDetail.addEventListener("toggle", () => {
      if (targetDetail.open) {
        escape_room_game_details.forEach((escape_room_game_detail) => {
          if (escape_room_game_detail !== targetDetail) {
            escape_room_game_detail.removeAttribute("open");
          }
        });
      }
    });
  });
});