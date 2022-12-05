const menubutton = document.getElementById("menubutton");
const ul = document.querySelector(".navigation ul");
const nav = document.querySelector(".navbar");	
const navLink = document.querySelectorAll(".myLinks");
let navTop = nav.offsetTop;
const drop = document.getElementById("drop");
const closenav = document.getElementById("close");



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


