
console.log("Welcome to My Website!");


window.addEventListener("scroll", () => {
    const header = document.querySelector("header");
    header.style.backgroundColor = window.scrollY > 50 ? "#555" : "#333";
});



document.querySelector("#signup-form")?.addEventListener("submit", async (e) => {
    e.preventDefault();
    const form = e.target;
    const res = await fetch("http://localhost/winnies_garden_backend/signup.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        name: form.name.value,
        email: form.email.value,
        password: form.password.value,
        confirmPassword: form.confirmPassword.value
      })
    });
    const data = await res.json();
    alert(data.message);
  });
  
  
  document.querySelector("#signin-form")?.addEventListener("submit", async (e) => {
    e.preventDefault();
    const form = e.target;
    const res = await fetch("http://localhost/winnies_garden_backend/signin.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        email: form.email.value,
        password: form.password.value
      })
    });
    const data = await res.json();
    alert(data.message);
  });
  