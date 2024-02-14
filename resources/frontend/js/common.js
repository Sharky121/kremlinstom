const headerElement = document.querySelector("#page-header");
const mobileMenuTriggerElement = document.querySelector("#mobile-menu-trigger");

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