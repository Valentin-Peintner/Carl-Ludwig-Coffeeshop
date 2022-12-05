
function block() {
    const map = document.getElementById("gmap_canvas");
    map.style.display="block";
    const link = map.dataset.src;
    map.src = link;
}

// Alert box
const loadbutton = document.getElementById("loadgooglemaps");
    loadbutton.addEventListener("click", () => {
        if(confirm('Wollen Sie die Google map und deren Cookies laden?')){
            block();
            loadbutton.style.display = "none";
        }
});