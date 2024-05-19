let isOpen = false;

function openAside() {
    isOpen = !isOpen;
    let x = document.getElementById("aside");

    x.style = "animation: 0.5s " + (isOpen ? "slideIn" : "slideOut") + " forwards;";
}