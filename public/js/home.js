console.log("Hello ");

function toggleMenu() {
    var x = document.getElementById("myTopnav");
    if (x.classList.contains("active")) {
        x.classList.remove("active");
    } else {
        x.classList.add("active");
    }
}