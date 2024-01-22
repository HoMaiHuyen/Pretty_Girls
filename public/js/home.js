console.log("Hello ");

function toggleMenu() {
    var x = document.getElementById("myTopnav");
    if (x.classList.contains("active")) {
        x.classList.remove("active");
    } else {
        x.classList.add("active");
    }
}
function setActive(element) {
    // Remove active class from all menu items
    var menuItems = document.querySelectorAll('.main-menu a');
    menuItems.forEach(item => item.classList.remove('active-menu'));

    // Add active class to the clicked menu item
    element.classList.add('active-menu');
}

// Function to handle menu item click
function handleMenuClick(event) {
    // Prevent default link behavior
    event.preventDefault();

    // Get the clicked menu item
    var clickedMenuItem = event.target;

    // Set the active class for the clicked menu item
    setActive(clickedMenuItem);

    // Redirect to the link href
    window.location.href = clickedMenuItem.href;
}

// Attach click event listeners to each menu item
var menuItems = document.querySelectorAll('.main-menu a');
menuItems.forEach(item => item.addEventListener('click', handleMenuClick));


document.addEventListener('DOMContentLoaded', function () {
        var currentLocation = window.location.href;
        var menuItems = document.querySelectorAll('.main-menu a');

        menuItems.forEach(function (item) {
            if (item.href === currentLocation) {
                item.classList.add('active');
            }
        });
});
