const header = document.querySelector("#page-header");

const toggleClass = "header--sticky";

window.addEventListener("scroll", () => {
  const currentScroll = window.scrollY;
  
  if (currentScroll > 150) {
    header.classList.add(toggleClass);
  } else {
    header.classList.remove(toggleClass);
  }
});