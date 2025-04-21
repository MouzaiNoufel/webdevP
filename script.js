// Add a welcome message to the console
console.log("Welcome to My Website!");

// Example: Make the header change color when scrolled
window.addEventListener("scroll", () => {
    const header = document.querySelector("header");
    header.style.backgroundColor = window.scrollY > 50 ? "#555" : "#333";
});
