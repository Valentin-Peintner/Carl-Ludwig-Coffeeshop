const menubutton = document.getElementById("menubutton-shop");


const ul = document.querySelector(".navbar-s ul");
const nav = document.querySelector(".navbar-s");	
const navLink = document.querySelectorAll(".links");
let navTop = nav.offsetTop;
const drop = document.getElementById("drop-s");
const closenav = document.getElementById("close-s");



menubutton.addEventListener("click", () => {
  ul.classList.toggle("show");
  drop.classList.toggle("hide");
  closenav.classList.toggle("hide");
});

navLink.forEach((link) =>
    link.addEventListener("click", () => {
        ul.classList.remove("show");    
    })
);

function fixedNav() {
  if (window.scrollY >= navTop) {    
    nav.classList.remove('fixed');

  } else {
    nav.classList.add('fixed');    
  }
}
window.addEventListener('scroll', fixedNav);


