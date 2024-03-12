import Swiper from 'swiper/bundle';

const headerElement = document.querySelector("#page-header");
const mobileMenuTriggerElement = document.querySelector("#mobile-menu-trigger");
const rewiewsSwiper = document.querySelector("#reviews-swiper");
const ratingsSwiper = document.querySelector("#ratings-swiper");

const toggleClass = "header--sticky";

window.addEventListener("scroll", () => {
  const currentScroll = window.scrollY;
  
  if (currentScroll > 150) {
    headerElement.classList.add(toggleClass);
  } else {
    headerElement.classList.remove(toggleClass);
  }
});

mobileMenuTriggerElement.addEventListener('click', () => {
  
});

if (rewiewsSwiper) {
  new Swiper(rewiewsSwiper, {
    slidesPerView: 'auto',
    loop: true,
  });
}

if(ratingsSwiper) {
  new Swiper(ratingsSwiper, {
    slidesPerView: 'auto',
    loop: true,
  });
}